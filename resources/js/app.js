import './bootstrap';
import 'flowbite';
import { DataTable } from "simple-datatables";

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
if (document.getElementById("search-table") && typeof DataTable !== 'undefined') {
    const dataTable = new DataTable("#search-table", {
        searchable: true,
        sortable: false,
        perPageSelect: [7, 10, 15],
        perPage: 7,
        labels: {
            placeholder: "Cari",
            searchTitle: "Search within table",
            pageTitle: "Page {page}",
            perPage: "data/hlmn",
            noRows: "Data tidak ditemukan",
            info: "Showing {start} to {end} of {rows} entries",
            noResults: "Data yang anda cari tidak ditemukan",

        },
    });
}

var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function () {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }

});
