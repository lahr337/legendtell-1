const webpack = require('webpack'),
 path = require('path'),
 HtmlWebpackPlugin = require('html-webpack-plugin'),
 {CleanWebpackPlugin} = require('clean-webpack-plugin'),
 CopyWebpackPlugin = require('copy-webpack-plugin'),
 MiniCssExtractPlugin = require('mini-css-extract-plugin'),
 OptimizeCssAssetPlugin = require('optimize-css-assets-webpack-plugin'),
 TerserWebpackPlugin = require('terser-webpack-plugin'),
 {BundleAnalyzerPlugin} = require('webpack-bundle-analyzer'),
 LiveReloadPlugin = require('webpack-livereload-plugin'),
 SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
//  ImageminPlugin = require('imagemin-webpack-plugin').default;

const isDev = process.env.NODE_ENV === 'development';
const isProd = !isDev;

const optimization = () => {
  const config = {
    // splitChunks: {
    //   chunks: 'all'
    // }
  }

  if (isProd) {
    config.minimizer = [
      new OptimizeCssAssetPlugin(),
      new TerserWebpackPlugin()
    ]
  }

  return config;
}

const filename = ext => isDev ? `[name].${ext}` : `[name].[hash].${ext}`

const cssLoaders = extra => {
  const loaders = [{
    loader: MiniCssExtractPlugin.loader,
    options: {
      hrm: true,
      reloadAll: true
    }
  }, 'css-loader'];

  if (extra) {
    loaders.push(extra);
  }

  return loaders;
};

const jsLoaders = () => {
  const loaders = [{
    loader: 'babel-loader',
    options: {
      presets: [
        '@babel/preset-env'
      ],
      plugins: [
        '@babel/plugin-proposal-class-properties'
      ]
    }
  }];

  // if (isDev) {
  //   loaders.push('eslint-loader');
  // }

  return loaders;
}

const plugins = () => {
  const base  = [
    // new webpack.HotModuleReplacementPlugin(),
    new CleanWebpackPlugin(),
    new CopyWebpackPlugin([
      {
        from: path.resolve(__dirname, 'resources/assets/plugins'),
        to: path.resolve(__dirname, 'dist/assets/plugins')
      },
      {
        from: path.resolve(__dirname, 'resources/assets/favicon.ico'),
        to: path.resolve(__dirname, 'dist/assets')
      },
      {
        from: path.resolve(__dirname, 'resources/assets/fonts'),
        to: path.resolve(__dirname, 'dist/assets/fonts')
      },
      {
        from: path.resolve(__dirname, 'resources/assets/pics'),
        to: path.resolve(__dirname, 'dist/assets/pics')
      },
      {
        from: path.resolve(__dirname, 'resources/assets/images'),
        to: path.resolve(__dirname, 'dist/assets/images')
      },
      {
        from: path.resolve(__dirname, 'resources/assets/svg'),
        to: path.resolve(__dirname, 'dist/assets/svg')
      },
    ]),
    new MiniCssExtractPlugin({
      filename: './assets/css/' + filename('css')
    }),
    new SpriteLoaderPlugin(),
  ]

  // if (isProd) {
  //   base.push(new BundleAnalyzerPlugin());
  // }

  return base;
}

module.exports = {
  context: path.resolve(__dirname, 'resources'),
  mode: 'development',
  entry: {
    home: './assets/js/home.js',
    reportsPayment: './assets/js/reportsPayment.js',
    recordNotFound: './assets/js/recordNotFound.js',
    found: './assets/js/found.js',
    viewAppraisal: './assets/js/viewAppraisal.js',
    venhicle: './assets/js/venhicle.js',
    createYourAccount: './assets/js/createYourAccount.js',
    accountSettings: './assets/js/accountSettings.js',
    networkShops: './assets/js/networkShops.js',
    shopPage: './assets/js/shopPage.js',
    fixedIssues: './assets/js/fixedIssues.js',
    help: './assets/js/help.js',
    addCar: './assets/js/addCar.js',
    dashboardReg: './assets/js/dashboardReg.js',
    dashboardServiceHistory: './assets/js/dashboardServiceHistory.js',
    dashboardRepairCosts: './assets/js/dashboardRepairCosts.js',
    dashboardMedia: './assets/js/dashboardMedia.js',
    dashboardAppraisal: './assets/js/dashboardAppraisal.js',
  },
  output: {
    filename: './assets/js/' + filename('js'),
    path: path.resolve(__dirname, 'dist')
  },
  resolve: {
    extensions: ['.js', '.json'],
    alias: {
      '@js': path.resolve(__dirname, 'resources/assets/js'),
      '@': path.resolve(__dirname, 'resources'),
      '@styles' : path.resolve(__dirname, 'resources/assets/sass'),
      '@images' : path.resolve(__dirname, 'resources/assets/images'),
      '@svg' : path.resolve(__dirname, 'resources/assets/images/svg')
    }
  },
  optimization: optimization(),
  devServer: {
    port: 4000,
    hot: isDev,
    inline: true,
    host: '0.0.0.0',
    disableHostCheck: true,
  },
  devtool: isDev ? 'source-map' : '',
  plugins: plugins(),
  module: {
    rules: [
      {
        test: /\.pug$/,
        loaders: ['html-loader', 'pug-html-loader'],
      },
      {
        test: /\.css$/,
        use: cssLoaders()
      },
      {
        test: /\.s[ac]ss$/,
        use: cssLoaders('sass-loader')
      },
      {
        test: /\.(png|jpg|gif|svg|webp)$/,
        exclude: [
          path.resolve(__dirname, 'resources/assets/fonts')
        ],
        use: [{
          loader: 'file-loader',
          options: {
            name: '[path][name].[ext]',
          }
        }]
      },
      {
        test: /\.(mp4|webm)$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[path][name].[ext]',
          }
        }]
      },
      {
        test: /\.(ttf|woff|woff2|eot|svg)$/,
        include: path.resolve(__dirname, 'resources/assets/fonts'),
        use: [{
          loader: 'file-loader',
          options: {
            type: 'assets/fonts',
            name: '[path][name].[ext]',
          }
        }]
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: jsLoaders()
      },
    ]
  }
}