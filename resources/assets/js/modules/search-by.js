import customSelect from 'custom-select'
import AjaxCall from  './../classes/AjaxCall'

customSelect('select')

// Change search type
const wrapper = document.getElementById('searchTypeSelectWrapper'),
    searchByVinRadio = document.getElementById('searchByVinRadio'),
    searchByYearRadio = document.getElementById('searchByYearRadio'),
    searchByVinBlock = document.getElementById('searchByVin'),
    searchByYearBlock = document.getElementById('searchByYear'),
    activeBlockClass = 'search-by-vin__search-type--active',
    yearSelect = document.getElementById('year'),
    makeSelect = document.getElementById('make'),
    modelSelect = document.getElementById('model'),
    SearchButton = document.getElementById('SearchButton'),
    vinInput = document.getElementById('vin'),
    VinSearchButton = document.getElementById('VinSearchButton'),
    resultContainer = document.getElementById('resultContainer');

searchByVinRadio.addEventListener('change', () => {
    searchByVinRadio.checked && ( showVinSearch() )
})

searchByYearRadio.addEventListener('change', () => {
    searchByYearRadio.checked && ( showYearSearch() )
})

SearchButton.addEventListener('click', () => {
    AjaxCall.json("/search", "post",{
        year: yearSelect.value,
        make: makeSelect.value,
        model: modelSelect.value
    }, function(response){
        console.log(response);
        resultContainer.innerHTML = response;
    });
})

VinSearchButton.addEventListener('click', () => {
    if(vinInput.value != "") {
        AjaxCall.json("/search", "post",{
            vin: vinInput.value,
        }, function(response){
            console.log(response);
            resultContainer.innerHTML = response;
        });
    } else {
        toastr.error('Empty search not allow!', 'Home');
    }

})

const showVinSearch = () => {
    document.querySelector(`.${activeBlockClass}`).classList.remove(activeBlockClass)
    searchByVinBlock.classList.add(activeBlockClass)
}

const showYearSearch = () => {
    document.querySelector(`.${activeBlockClass}`).classList.remove(activeBlockClass)
    searchByYearBlock.classList.add(activeBlockClass)
}

function customSelectEmpty(selectID, text) {
    const sel =  selectID.customSelect
    sel.empty();
    const option1 = document.createElement('option');
    option1.text = text;
    option1.value = text;
    sel.append(option1);
    return sel;
}


const yearSel = customSelectEmpty(yearSelect, 'Year');
AjaxCall.json("/get/years", "post",{}, function(response){
    let data = eval(response);
    let max_year = data?.Years?.max_year;
    let min_year = data?.Years?.min_year;
    // debugger
    for(let i = max_year; i >= min_year;i--){
        const option = document.createElement('option');
        option.text = i;
        option.value = i;
        yearSel.append(option);
    }
});

// When select year

yearSelect.addEventListener('change', (event) => {
    const makeSel = customSelectEmpty(makeSelect, 'Make');
    const modelSel = customSelectEmpty(modelSelect, 'Model');
    AjaxCall.json("/get/makes", "post",{year: yearSelect.value }, function(response){
        let data = eval(response);
        let makes = data?.Makes;
        if(makes.length > 0) {
            for(let index in makes){
                const option = document.createElement('option');
                option.text = makes[index].make_display;
                option.value = makes[index].make_id;
                makeSel.append(option);
            }
        }
    });
})


// When select year
makeSelect.addEventListener('change', (event) => {
    const modelSel = customSelectEmpty(modelSelect, 'Model');
    AjaxCall.json("/get/models", "post",{year: yearSelect.value, make: makeSelect.value }, function(response){
        let data = eval(response);
        let models = data?.Models;
        if(models.length > 0) {
            for(let index in models){
                const option = document.createElement('option');
                option.text = models[index].model_name;
                option.value = models[index].model_name;
                modelSel.append(option);
            }
        }
    });
})
