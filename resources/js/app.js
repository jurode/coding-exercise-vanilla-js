require('./bootstrap');

let jobs = Array.from(document.getElementsByClassName('job-container'));

// ==================
// == INPUT FILTER
// ==================

document.addEventListener('keyup', () => {
    let input = document.getElementById('input-search');

    jobs.forEach(element => {
        let title = element.children[0].innerText.toLowerCase();
        let container = element;
        if (!title.includes(input.value.toLowerCase())) {
            container.classList.add('d-none');
        } else {
            if (container.classList.contains('d-none')) {
                container.classList.remove('d-none');
            }
        }
    });
})

// ==================
// == GET DATA
// ==================

let companies = [];
axios({
    method: 'get',
    url: '/companies',
    responseType: 'stream'
}).then((result) => {
    result.data.companies.forEach(comp => {
        companies.push(comp.name);
    })
    getCompanies();
})

let locations = [];
jobs.forEach(element => {
    let loc = element.children[1].children[1].innerText;
    if (!locations.find(el => el === loc)) {
        locations.push(loc);
    }
})

// manipulate jobs according published (should be done with php/blade)
let dateTime = new Date().toISOString(); // FIXME

jobs.forEach(element => {
    let published_at = document.querySelector('.job-container').children[1].children[2].innerText;

    // if (published_at != (dateTime - 7 Tage)
    //      jobs.classList.add('d-none');
    // FIXME

})


// =================================
// == CREATE JOBS / COMPANIES FILTER
// =================================

let outputL = document.getElementById('locations');
locations.forEach((loc, index) => {

    let span = document.createElement("span");
    span.classList.add('d-block');
    outputL.appendChild(span);

    let input = document.createElement('input');
    input.type = 'checkbox';
    input.classList.add('me-1');
    input.setAttribute('id', 'location' + index);
    span.appendChild(input);

    let label = document.createElement('label');
    label.setAttribute('for', 'location' + index);
    let textnode = document.createTextNode(loc);
    label.appendChild(textnode);
    span.appendChild(label);

})

const getCompanies = () => {
    let outputC = document.getElementById('companies');
    companies.forEach((comp, index) => {

        let span = document.createElement("span");
        span.classList.add('d-block');
        outputC.appendChild(span);

        let input = document.createElement('input');
        input.type = 'checkbox';
        input.classList.add('me-1');
        input.setAttribute('id', 'company' + index);
        span.appendChild(input);

        let label = document.createElement('label');
        label.setAttribute('for', 'company' + index);
        let textnode = document.createTextNode(comp);
        label.appendChild(textnode);
        span.appendChild(label);
    });

    let companyFieldsRaw = document.querySelectorAll('.job-container .company');

    companyFieldsRaw.forEach(el => {
        let id = el.children[0].value;
        el.innerText = companies[id - 1];
    })

}

// =================================
// == FILTER LOCATIONS/COMPANIES
// =================================


let cbLocations = document.querySelectorAll('#locations [type="checkbox"]');
let labelLocations = document.querySelectorAll('#locations label');
let showLocation = []; // e.g. [Salzburg, Graz]

cbLocations.forEach((loc, index) => {
    loc.addEventListener('change', () => {
        if (loc['checked']) {
            if (!showLocation.find(el => el === labelLocations[index].innerText)) {
                showLocation.push(labelLocations[index].innerText);
            }
        } else {
            showLocation = showLocation.filter(el => el !== labelLocations[index].innerText);
        }

        jobs.forEach(element => {
            let jobLocation = element.children[1].children[1].innerText;
            let container = element;

            if (!showLocation.find(el => el === jobLocation) && showLocation.length > 0) {
                if (!container.classList.contains('d-none')) {
                    container.classList.add('d-none');
                }
            } else {
                if (container.classList.contains('d-none')) {
                    container.classList.remove('d-none');
                }
            }
        })
    })
})

let showCompanies = [];
setTimeout(() => {
    let cbCompanies = document.querySelectorAll('#companies [type="checkbox"]');
    let labelCompanies = document.querySelectorAll('#companies label');

    cbCompanies.forEach((comp, index) => {
        comp.addEventListener('change', () => {
            if (comp['checked']) {
                if (!showCompanies.find(el => el === labelCompanies[index].innerText)) {
                    showCompanies.push(labelCompanies[index].innerText);
                }
            } else {
                showCompanies = showCompanies.filter(el => el !== labelCompanies[index].innerText);
            }

            jobs.forEach(element => {
                let company = element.children[1].children[0].innerText;
                let container = element;
                if (!showCompanies.find(el => el === company) && showCompanies.length > 0) {
                    if (!container.classList.contains('d-none')) {
                        container.classList.add('d-none');
                    }
                } else {
                    if (container.classList.contains('d-none')) {
                        container.classList.remove('d-none');
                    }
                }
            })
        })
    })
}, 1000) // FIXME


// =================================
// == ADD-JOB
// =================================
// FIXME: separates .js-File:

let signedIn = false; // ! change here for switching mode

const username = 'admin';
const password = 'supersecure';
const signForm = document.getElementById('signForm');
const addForm = document.getElementById('addForm');
let feedback = document.getElementById('feedback');
let showFeedback = false;

// FIXME
if (!signedIn) {
    signForm.classList.remove('d-none');
    addForm.classList.add('d-none');
} else {
    signForm.classList.add('d-none');
    addForm.classList.remove('d-none');
}

if (!showFeedback) {
    feedback.classList.add('d-none');
} else {
    feedback.classList.remove('d-none');
}


// FIXME
function onSubmit() {
    let submittedUsername = document.getElementById('username');
    let submittedPassword = document.getElementById('password');

    if (submittedUsername === username && submittedPassword === password) {
        signedIn = true;
    } else {
        feedback.innerText = 'Username oder Passwort falsch.'
    }
}

if (signedIn) {

    let selectContainer = document.getElementById('company-select');

    setTimeout(() => {
        companies.forEach((comp, index) => {
            let option = document.createElement('option');
            option.setAttribute('value', index);
            let text = document.createTextNode(comp);
            option.appendChild(text);
            selectContainer.appendChild(option);
        })
    }, 1500) // FIXME

}

// FIXME: Submit Job & Post Job in DB => weil in php (click) mit .js nicht aufrufbar, nicht gemacht
