import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Lingallery from 'lingallery';

/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/
require('./bootstrap');

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
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        $notification = $delete.parentNode;
        $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
        });
    });


    /**
    * File upload name change
    */
    const file = document.getElementById('fileinput');
    if(file) {
        file.onchange = function(){
            if(file.files.length > 0) {
                document.getElementById('filename').innerHTML = file.files[0].name;
            };
        };
    };

    /**
    * File upload
    */
    const button = document.getElementById('file_upload');
    if(button) {
        button.onclick = function (e) {

            // Prevent form beeing submitted..
            e.preventDefault();

            // Get the file from input
            let file = document.getElementById('fileinput').files[0];

            // Attach file to FormData
            let data = new FormData();
            data.append('id', '');
            data.append('file', file);

            // Config
            let config = {
                onUploadProgress: function(progressEvent) {
                    var percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                }
            };

            // Output
            let output = document.getElementById('output');

            // Ajax magic
            axios.post('/dashboard/image/upload', data, config)
            .then(function (res) {
                output.className = 'help is-success';
                output.innerHTML = res.data;
            })
            .catch(function (err) {
                output.className = 'help is-danger';
                output.innerHTML = err.message;
            });

            //
            console.log(file);

        };
    };

    /**
     * Wysiwyg editor
     */
    const description = document.getElementById('description');
    if(description) {
        ClassicEditor
            .create( document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    }

});




require('./bulma-extensions');
