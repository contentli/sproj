import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Lingallery from 'lingallery';

/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/
require('./bootstrap');
require('./bulma-extensions');

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

Vue.component('lingallery', Lingallery);
Vue.use(CKEditor);

const app = new Vue({
    el: '#app',
    // data: {
    //     editor: ClassicEditor,
    //     editorData: '<p>Content of the editor.</p>',
    //     editorConfig: {
    //         // The configuration of the editor.
    //     }
    // }
});


// Document ready
document.addEventListener('DOMContentLoaded', () => {

    /**
    * Navbar burger toggle
    */

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {

                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);

                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

    /**
    * Logic for delete buttons (notifications etc)
    */
    document.querySelectorAll('.notification .container .delete').forEach(($el) => {
        if ($el) {
            let $notification = $el.parentNode.parentNode;
            $el.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        }
    });

    /**
    * File upload name change
    */
    const file = document.getElementById('fileinput');
    if (file) {
        file.onchange = function () {
            if (file.files.length > 0) {
                document.getElementById('filename').innerHTML = file.files[0].name;
            };
        };
    };

    /**
    * File upload
    */
    const button = document.getElementById('fileupload');

    // Output
    let output = document.getElementById('output');
    let images = document.getElementById('image_container');

    if (button) {
        button.onclick = function (e) {

            // Prevent form beeing submitted..
            e.preventDefault();

            // Get the file and id from dom
            let file = document.getElementById('fileinput').files[0];
            let id = document.getElementById('productid').value;

            // Attach file to FormData
            let data = new FormData();
            data.append('id', id);
            data.append('file', file);

            // Axios Config
            let config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: function (progressEvent) {
                    button.className = 'button is-success is-loading';
                    var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                }
            };

            // Ajax magic
            axios.post(
                '/dashboard/image/upload', data, config)
                .then(function (res) {
                    // Set some status
                    output.className = 'help is-success';
                    button.className = 'button is-success';
                    output.innerHTML = res.data.message;

                    // Clear form
                    document.getElementById("fileinput").value = "";
                    document.getElementById('filename').innerHTML = '';

                    // Updated images
                    images.innerHTML = '';
                    res.data.files.forEach(element => {

                        images.innerHTML += `<div class="column is-2">
                        <div class="box image">
                        <a class="delete" onclick="event.preventDefault();deleteImage('${element.id}')"></a>
                        <img src="${element.src}">
                        </div>
                        </div>`;

                    });

                })
                .catch(function (err) {
                    output.className = 'help is-danger';
                    button.className = 'button is-danger';
                    output.innerHTML = err.message;
                });
        };
    };

    /**
    * Delete image function
    */
    window.deleteImage = (id) => {

        // Attach file to FormData
        let data = new FormData();
        data.append('id', id);

        // Axios Config
        let config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function (progressEvent) {
                var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
            }
        };

        // Ajax magic
        axios.post('/dashboard/image/delete', data, config)
            .then(function (res) {
                // Set some status
                output.className = 'help is-success';
                output.innerHTML = res.data.message;

                // Updated images
                images.innerHTML = '';
                res.data.files.forEach(element => {
                    images.innerHTML += `<div class="column is-2">
                    <div class="box image">
                    <a class="delete" onclick="event.preventDefault();deleteImage('${element.id}')"></a>
                    <img src="${element.src}">
                    </div>
                    </div>`;
                });

            })
            .catch(function (err) {
                output.className = 'help is-danger';
                output.innerHTML = err.message;
            });

    }

    /**
    * Calendar
    */
    // Initialize all input of date type.
    const calendar = bulmaCalendar.attach('#published_at', {
        type: 'time',
        displayMode: 'default',
        showTodayButton: true,
        dateFormat: "YYYY-MM-DD",
        timeFormat: "HH:mm:ss"
    });

    if (calendar) {

        calendar.on('date:selected', date => {
            console.log(date);
        });

        // To access to bulmaCalendar instance of an element
        // const element = document.querySelector('#my-element');
        // if (element) {
        //     // bulmaCalendar instance is available as element.bulmaCalendar
        //     element.bulmaCalendar.on('select', datepicker => {
        //         console.log(datepicker.data.value());
        //     });
        // }
    }

    /**
    * Wysiwyg editor
    */
    const description = document.getElementById('description');
    if (description) {
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    }

});


