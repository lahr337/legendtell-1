"use strict";

var KTLayoutQuickCartDrawerPanel = function() {
    class InitZ {
        // Private properties    
        _prefix = 'kt_quick_cart_';
        _element;
        _offcanvasObject;
        _containerId;
        _addBtn;
        _addInput;
        _inputContainer;
        _saveBtn;
        _form;
        _add_form;
        _errors;
        _loader;
        _index = 0;
        _data = [];
        _anyEdited = false;
        _fields = {
            option: 'option',
            option_type: 'option_type',
        };
        _validation;
        constructor(id){
            this._type = id;
            this._id = this._prefix + this._type;
            this._element = KTUtil.getById(this._id);
            console.log('this._id', this._type, this._id, this._element)
            this.load();
        } 

        // Private functions
        load(){
            // Define IDs
            this._containerId = `#${this._id}_container`;
            this._addBtn = `#${this._id}_add_btn`;
            this._addInput = `#${this._id}_add_input`;
            this._inputContainer = `#${this._id}_input_container`;
            this._saveBtn = `#${this._id}_btn_save`;
            this._form = `#${this._id}_form`;
            this._add_form = `${this._id}_add_form`;            
            this._errors = `#${this._id}_errors`;
            this._loader = `#${this._id}_loader`;

            this.loadCanvas();
            // this.loadData();
            this.loadInputContainer();
            this.loadClicks();
            this.loadValidation();
        }

        loadCanvas(){
            var _this = this;
            _this._offcanvasObject = new KTOffcanvas(_this._element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: this._id+'_close',
                toggleBy: this._id+'_toggle'
            });

            _this._offcanvasObject.on('beforeShow', function(){
                // console.log('Load.....Popup');
                $(_this._element).find('input[name="option"]').val('')
				$(_this._element).find('input[name="option_type"]').val('').trigger('change')
                $(_this._element).find('.fv-plugins-icon-container').removeClass('has-danger');
                $(_this._element).find('.fv-plugins-message-container').empty();
                _this._validation.resetForm();
                _this.loadData();
            })

            var header = KTUtil.find(_this._element, '.offcanvas-header');
            var content = KTUtil.find(_this._element, '.offcanvas-content');
            var wrapper = KTUtil.find(_this._element, '.offcanvas-wrapper');
            var footer = KTUtil.find(_this._element, '.offcanvas-footer');

            KTUtil.scrollInit(wrapper, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function() {
                    var height = parseInt(KTUtil.getViewPort().height);

                    if (header) {
                        height = height - parseInt(KTUtil.actualHeight(header));
                        height = height - parseInt(KTUtil.css(header, 'marginTop'));
                        height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                    }

                    if (content) {
                        height = height - parseInt(KTUtil.css(content, 'marginTop'));
                        height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                    }

                    if (wrapper) {
                        height = height - parseInt(KTUtil.css(wrapper, 'marginTop'));
                        height = height - parseInt(KTUtil.css(wrapper, 'marginBottom'));
                    }

                    if (footer) {
                        height = height - parseInt(KTUtil.actualHeight(footer));
                        height = height - parseInt(KTUtil.css(footer, 'marginTop'));
                        height = height - parseInt(KTUtil.css(footer, 'marginBottom'));
                    }

                    height = height - parseInt(KTUtil.css(_this._element, 'paddingTop'));
                    height = height - parseInt(KTUtil.css(_this._element, 'paddingBottom'));

                    height = height - 2;

                    return height;
                }
            });
        }

        nameAlreadyExistsValidator(_this) {
            return {
                validate: function(input) {
                    const value = input.value;
                    let values = [];
                    $( _this._form ).find('.form-input-name').each((i, el)=>{
                        values.push($(el).val());
                    })
                    
                    if(value=='' || values.indexOf(value) == -1){
                        return {
                            valid: true,
                        }
                    }
                    
                    return {
                        valid: false,
                        message: 'already exists'
                    };
                },
            };
        }

        loadValidation(){
            var _this = this;

			FormValidation.validators.nameExists = this.nameAlreadyExistsValidator.bind(null, _this);
            _this._validation = FormValidation.formValidation(
				KTUtil.getById(_this._add_form),
				{
					fields: {
						option: {
							validators: {
								notEmpty: {
									message: 'required'
								},
								nameExists: {
									message: 'already exists'
								},
							}
						},
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
						// defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						// bootstrap: new FormValidation.plugins.Bootstrap(),
						bootstrap: new FormValidation.plugins.Bootstrap({
							rowSelector: ".fv-row",
							eleInvalidClass: "",
							eleValidClass: ""
						}),
					}
				}
			);

        }

        loadInputContainer(){
            var _this = this;
            $(_this._inputContainer)
            .append(
                $('<div class="p-0 fv-row"></div>')
                .append(`<input class="col-11 form-control input-name" id="${_this._id}_add_input_option" name="option" placeholder="Option" />`)
            );
            
        }

        loadData(){
            var _this = this;

            $(_this._containerId).empty();
            $(_this._loader).show();
            
            // Load menu select2
            $(_this._containerId)
            .append('<div id="list-item-container"></div>');

            _this.loadMenuOptions();

            $(_this._loader).hide();

        }

        loadMenuOptions(){
            var _this = this;
            $(_this._loader).show();
            // menu/options
            _this._data = options;
            for(let _i in _this._data){
                _this.loadTemplate(_this._data[_i]);
            }
            $(_this._loader).hide();
        }

        setInputs(){
            var _this = this;
            let new_data = {
                id:null,
                option: $(`${_this._addInput}_${_this._fields.option}`).val(),
                option_type: $(`${_this._addInput}_${_this._fields.option_type}`).val(),
            }
            _this.loadTemplate(new_data);
            $(`${_this._addInput}_${_this._fields.option}`).val('');
            $(`${_this._addInput}_${_this._fields.option_type}`).val('').trigger('change');
            $(_this._addBtn).css('pointer-events', 'none');
        }

        loadClicks(){
            var _this = this;
            $(_this._addBtn).on('click', function(e){
                e.preventDefault();
				console.log('clicked')
				_this._validation.validate().then(function(status) {

				    console.log('_validation status', status)
					if(status == 'Valid'){
                        _this.setInputs();
                        // KTUtil.scrollTop();
                    
                    }                    
				});
            })

            $(_this._saveBtn).on('click', function(e){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type:"POST",
                    url:'/recipes/menu-options/drawer-save',
                    async: false,
                    data:  $( _this._form ).serialize(),
                    success: function(response){
                        if(response != undefined) {
                            options = response;
                            _this._offcanvasObject.hide();    
                        }
                    },
                    error: function (jqXHR, status) { 
                        
                    }
                });
            });

            $( `#${_this._add_form} input`).on('keyup keypress blur change', function(e){                
                if($('#kt_select2_drawer_recipe_menu_id').val() != ''){
                    _this._validation.validateField(e.currentTarget.name).then(function(status) {
                        if(status == 'Valid') {
                            $(_this._addBtn).css('pointer-events', "");
                        } else {
                            $(_this._addBtn).css('pointer-events', 'none');
                        }
                    })
                } else {
                    $(_this._addBtn).css('pointer-events', 'none');
                }


            });

        }

        loadTemplate(data){
            var _this = this;
            var _input_option = $(`<input type="hidden" class="form-control form-input-name" name="${_this._type}[${_this._index}][option]" value="${data.option}" />`);
            
            $(`${_this._containerId} #list-item-container`)
            .append(
                $(`<div class="d-flex align-items-center justify-content-between py-8 item-container-${_this._index} "></div>`)
                .append(
                    $('<div class="d-flex flex-column mr-2"></div>')
                    .append(
                        (data.id == null) ? '' : $(`<input type="hidden" class="form-control" name="${_this._type}_ids[]" value="${data.id}" />`)
                    )
                    .append(
                        $(`<input type="hidden" class="form-control" name="${_this._type}[${_this._index}][id]" value="${data.id != null ? data.id : ''}" />`)
                    )
                    .append( $(_input_option) )
                    .append( 
                        $(`<label class="col-form-label"></label>`)
                        .append(`<b>${data.option}</b>`)
                     )
                )
                .append(
                    
                    $(`<a href="#" class="symbol symbol-70 flex-shrink-0 btn btn-xs ${(data.id != null && !data.deletable)? 'btn-secondary':'btn-light-danger'} btn-icon mr-2" data-_index="${_this._index}" style="${ (data.id != null && !data.deletable) ? 'pointer-events: none;':'' }"><i class="ki ki-minus icon-xs"></i></a>`)
                    .on('click', (e)=> {
                        let data_index = e.currentTarget.dataset._index; //$(e.target).data('_index')
                        $(`${_this._containerId} .separator-${data_index}`).remove();
                        $(`${_this._containerId} .item-container-${data_index}`).remove();
                        // e.currentTarget.parentNode.remove();
                    })
                    
                )
            )
            .append(`<div class="separator separator-solid separator-${_this._index}"></div>`)
            if(data.id == null){
                $(_input_option).trigger('focus');
            }
            _this._index++;
        }
    }

    // Public methods
    return {
        init: function(id) {

            new InitZ(id);
        }
    };
}();

jQuery(document).ready(function () {
	KTLayoutQuickCartDrawerPanel.init('menu_options');
    
});
