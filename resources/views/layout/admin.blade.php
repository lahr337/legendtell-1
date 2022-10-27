{{--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/> -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        <script src="https://unpkg.com/@ag-grid-community/all-modules@25.3.0/dist/ag-grid-community.min.noStyle.js"></script>
        <script src="https://unpkg.com/@ag-grid-enterprise/all-modules@25.3.0/dist/ag-grid-enterprise.min.js">
		</script>
        <script src="{{ asset('js/crypto/ag-grid/input-cell-render-ag-grid.js') }}" type="text/javascript"></script>
        <script>
              agGrid.LicenseManager.setLicenseKey("CompanyName=Servoy B.V.,LicensedApplication=Servoy,LicenseType=SingleApplication,LicensedConcurrentDeveloperCount=7,LicensedProductionInstancesCount=200,AssetReference=AG-010463,ExpiryDate=11_October_2021_[v2]_MTYzMzkwNjgwMDAwMA==4c6752fe4cb2066ab1f0e9c572bc7491");
        </script>

        <link rel="stylesheet" href="https://unpkg.com/@ag-grid-community/all-modules@25.3.0/dist/styles/ag-grid.css" />
        <link rel="stylesheet" href="https://unpkg.com/@ag-grid-community/all-modules@25.3.0/dist/styles/ag-theme-material.css" />

        <style>
            .modal-body {
                padding: 0rem;
            }
            .ag-theme-material .ag-cell-inline-editing {
                line-height: inherit;
                padding: 8px;
                height: inherit;
            }
            .ag-input-field-input.ag-text-field-input{
                border: none;
                height: 30px !important;
            }
            .ag-theme-material .ag-cell-inline-editing:active{
                border: none;
            }
            .ag-theme-material .ag-input-wrapper{
                border: 1px solid;
            }
            .ag-theme-material .ag-ltr .ag-has-focus .ag-cell-focus:not(.ag-cell-range-selected),
            .ag-theme-material .ag-ltr .ag-context-menu-open .ag-cell-focus:not(.ag-cell-range-selected),
            .ag-theme-material .ag-ltr .ag-has-focus .ag-full-width-row.ag-row-focus .ag-cell-wrapper.ag-row-group,
            .ag-theme-material .ag-ltr .ag-cell-range-single-cell,
            .ag-theme-material .ag-ltr .ag-cell-range-single-cell.ag-cell-range-handle, .ag-theme-material .ag-rtl .ag-has-focus .ag-cell-focus:not(.ag-cell-range-selected),
            .ag-theme-material .ag-rtl .ag-context-menu-open .ag-cell-focus:not(.ag-cell-range-selected),
            .ag-theme-material .ag-rtl .ag-has-focus .ag-full-width-row.ag-row-focus .ag-cell-wrapper.ag-row-group,
            .ag-theme-material .ag-rtl .ag-cell-range-single-cell,
            .ag-theme-material .ag-rtl .ag-cell-range-single-cell.ag-cell-range-handle {
                border: 0px solid;
            }
            .ag-theme-material .ag-cell-not-inline-editing input{
                margin: 0px;
                padding: 0px;
                line-height: 0;
            }
            .ag-theme-material .ag-cell-inline-editing{
                border: none;
                box-shadow: none;
            }
            .ag-theme-material .ag-cell-not-inline-editing{
                border: none;
                box-shadow: none;
                padding: 8px;
                padding-top: 0px;
            }
            .ag-theme-material .ag-cell-not-inline-editing .ag-cell-edit-wrapper{
                margin-top: 8px;
            }
            .ag-theme-material .ag-header-cell, .ag-theme-material .ag-header-group-cell {
                padding-left: 10px;
                padding-right: 10px;
            }
            .height-100,
            .card.card-custom, 
            .card.card-custom > .card-body, 
            .card.card-custom > .card-body > .tab-content, 
            .card.card-custom > .card-body > .tab-content > .tab-pane {
                height:100%;
            }
            .ag-theme-material,
            .card.card-custom > .card-body > .ag-theme-material,
            .card.card-custom > .card-body > .tab-content > .tab-pane > .ag-theme-material {
                width: 100%;
                height: 100%;
            }
        </style>
        
        {{-- Includable CSS --}}
        @yield('styles')

    </head>

    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif

        @include('layout.base._layout')
        <script>var HOST_URL = "{{ route('quick-search') }}";</script>

        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
            
        </script>

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach


        {{-- Includable JS --}}

        <!-- Resources -->
        <script src="{{ asset('plugins/custom/amcharts4/core.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/custom/amcharts4/charts.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/custom/amcharts4/themes/animated.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/custom/amcharts4/themes/dark.js') }}" type="text/javascript"></script>
        
        @yield('scripts')

    </body>
</html>

