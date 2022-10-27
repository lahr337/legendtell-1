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
        _groupFields = {
            name: 'name',
            abbreviation: 'abbreviation',
            first_index: 'first_index',
        };
        _unitFields = {
            name: 'name',
        };
        _validation;
        constructor(id){
            this._type = id;
            this._id = this._prefix + this._type;
            this._element = KTUtil.getById(this._id);

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
                $(_this._element).find('input[name="name"]').val('')
				$(_this._element).find('input[name="abbreviation"]').val('')
				$(_this._element).find('input[name="first_index"]').val('001')
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
            if(_this._type == 'units'){
                _this._loadUnitsValidation()
            } else {
                _this._loadGroupsValidation()
            }
        }

        _loadUnitsValidation(){
            var _this = this;
            _this._validation = FormValidation.formValidation(
				KTUtil.getById(_this._add_form),
				{
					fields: {
						name: {
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

        _loadGroupsValidation(){
            var _this = this;
            _this._validation = FormValidation.formValidation(
				KTUtil.getById(_this._add_form),
				{
					fields: {
						name: {
							validators: {
								notEmpty: {
									message: 'required'
								},
								nameExists: {
									message: 'already exists'
								},
							}
						},
                        abbreviation: {
							validators: {
								notEmpty: {
									message: 'required'
								}
							}
						},
                        first_index: {
							validators: {
								notEmpty: {
									message: 'required'
								}
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
            if(_this._type == 'units'){
                _this._loadUnitsInputContainer()
            } else {
                _this._loadGroupsInputContainer()
            }
        }

        _loadUnitsInputContainer(){
            var _this = this;
            $(_this._inputContainer).empty();

            $(_this._inputContainer)
            .addClass('fv-row unit-row')
            .append(`<input class="form-control input-name" id="${_this._id}_add_input_name" placeholder="Name" name="name" />`);
        }

        _loadGroupsInputContainer(){
            var _this = this;
            $(_this._inputContainer).empty();

            $(_this._inputContainer)
            .append(
                $(`<div class="row ml-1 mb-2 fv-row"></div>`)
                .append(`<input class="col-11 form-control input-name" id="${_this._id}_add_input_name" name="name" placeholder="Name" />`)
            )
            .append(
                $(`<div class="row ml-1"></div>`)
                .append(
                    $('<div class="col-6 p-0 fv-row"></div>')
                    .append(`<input class="form-control" id="${_this._id}_add_input_abbreviation" name="abbreviation" placeholder="Abbreviation" />`)
                )
                .append(
                    $('<div class="col-5 ml-1 p-0 fv-row"></div>')
                    .append(`<input class="form-control" id="${_this._id}_add_input_first_index" name="first_index" placeholder="Index" value="001" />`)
                )
            );
        }

        loadData(){
            var _this = this;

            $(_this._containerId).empty();
            $(_this._loader).show();

            setTimeout(function() {
                $(_this._loader).hide();

                // Load data with ajax
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type:"GET",
                    url:'/items/'+_this._type,
                    dataType:'json',
                    contentType: "application/json; charset=utf-8",
                    async: false,
                    success: function(response){
                        _this._data = response;
                        for(let _i in _this._data){
                            _this.loadTemplate(_this._data[_i]);
                        }
                        $(_this._loader).hide();
                    },
                    error: function (jqXHR, status) { 
                        $(_this._loader).hide();
                    }
                });
            }, 600);


        }

        setInputs(){
            var _this = this;
            if(_this._type == 'units'){
                _this._setUnitsInputs()
            } else {
                _this._setGroupsInputs()
            }
            $(_this._addBtn).css('pointer-events', 'none');

        }
        _setUnitsInputs(){
            var _this = this;
            let new_name = $(`${_this._addInput}_${_this._unitFields.name}`).val();
            _this.loadTemplate({
                id: null,
                name: new_name,
            });
            $(`${_this._addInput}_${_this._unitFields.name}`).val('');
        }

        _setGroupsInputs(){
            var _this = this;
            let new_name = $(`${_this._addInput}_${_this._groupFields.name}`).val();
            let new_abbreviation = $(`${_this._addInput}_${_this._groupFields.abbreviation}`).val();
            let new_first_index = $(`${_this._addInput}_${_this._groupFields.first_index}`).val();
            _this.loadTemplate({
                id: null,
                name: new_name,
                abbreviation: new_abbreviation,
                first_index: new_first_index,
            });
            $(`${_this._addInput}_${_this._groupFields.name}`).val('');
            $(`${_this._addInput}_${_this._groupFields.abbreviation}`).val('');
            $(`${_this._addInput}_${_this._groupFields.first_index}`).val('001');
        }

        loadClicks(){
            var _this = this;
            $(_this._addBtn).on('click', function(e){
                e.preventDefault();
				console.log('clicked')
				_this._validation.validate().then(function(status) {
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
                    url:'/items/drawer-save/'+_this._type,
                    async: false,
                    data:  $( _this._form ).serialize(),
                    success: function(response){
                        console.log('response', response)
                        _this._offcanvasObject.hide();
                    },
                    error: function (jqXHR, status) { 
                        
                    }
                });
            });

            $( `#${_this._add_form} input`).on('keyup keypress blur change', function(e){                
                _this._validation.validateField(e.currentTarget.name).then(function(status) {
                    if(status == 'Valid') {
                        $(_this._addBtn).css('pointer-events', "");
                    } else {
                        $(_this._addBtn).css('pointer-events', 'none');
                    }
                })

            });

        }

        loadTemplate(data){
            var _this = this;
            if(_this._type == 'units'){
                _this._loadUnitsTemplate(data)
            } else {
                _this._loadGroupsTemplate(data)
            }
        }

        _loadUnitsTemplate(data = null){
            var _this = this;
            var _input = $(`<input class="form-control form-input-name" name="${_this._type}[${_this._index}][name]" value="${data.name}" />`);
            $(_input)
            .on('change', function(e){
                let name = e.target.name
                let value = e.target.value
                console.log('name', name)
                console.log('value', value)
            });
            $(_this._containerId)
            .append(
                $(`<div class="d-flex align-items-center justify-content-between py-8 item-container-${_this._index}"></div>`)
                .append(
                    $('<div class="d-flex flex-column mr-2"></div>')
                    .append(
                        (data.id == null) ? '' : $(`<input type="hidden" class="form-control" name="${_this._type}_ids[]" value="${data.id}" />`)
                    )
                    .append(
                        $(`<input type="hidden" class="form-control" name="${_this._type}[${_this._index}][id]" value="${data.id != null ? data.id : ''}" />`)
                    )
                    .append( $(_input) )
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
                $(_input).trigger('focus');
            }
            _this._index++;
        }

        _loadGroupsTemplate(data = null){
            var _this = this;
            var _input_name = $(`<input type="hidden" class="form-control form-input-name" name="${_this._type}[${_this._index}][name]" value="${data.name}" />`);
            var _input_abbreviation = $(`<input type="hidden" class="form-control form-input-name" name="${_this._type}[${_this._index}][abbreviation]" value="${data.abbreviation}" />`);
            var _input_first_index = $(`<input type="hidden" class="form-control form-input-name" name="${_this._type}[${_this._index}][first_index]" value="${data.first_index}" />`);
            
            $(_this._containerId)
            .append(
                $(`<div class="d-flex align-items-center justify-content-between py-8 item-container-${_this._index}"></div>`)
                .append(
                    $('<div class="d-flex flex-column mr-2"></div>')
                    .append(
                        (data.id == null) ? '' : $(`<input type="hidden" class="form-control" name="${_this._type}_ids[]" value="${data.id}" />`)
                    )
                    .append(
                        $(`<input type="hidden" class="form-control" name="${_this._type}[${_this._index}][id]" value="${data.id != null ? data.id : ''}" />`)
                    )
                    .append( $(_input_name) )
                    .append( $(_input_abbreviation) )
                    .append( $(_input_first_index) )
                    .append( 
                        $(`<label class="col-form-label"></label>`)
                        .append(`<b>${data.name}</b>, ${data.abbreviation ? (' '+data.abbreviation) : '' }${data.first_index?(', '+data.first_index):''}`)
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
                $(_input_name).trigger('focus');
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
	KTLayoutQuickCartDrawerPanel.init('units');
	KTLayoutQuickCartDrawerPanel.init('groups');
    
});
