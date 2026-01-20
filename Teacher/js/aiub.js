// JavaScript functions for AIUB University Management System

function loadpage(pageName) {
    // Function to load pages in iframe
    const iframe = document.getElementById('idframe');
    if (iframe) {
        iframe.src = pageName;
    }
}

// Function to handle logout
function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = 'maindashboard.html';
    }
}

// Function to handle form submissions
function submitForm(formId) {
    const form = document.getElementById(formId);
    if (form) {
        // Add form validation logic here
        alert('Form submitted successfully!');
    }
}

// Function to handle file uploads
function handleFileUpload(input) {
    const file = input.files[0];
    if (file) {
        console.log('File selected:', file.name);
        // Add file upload logic here
    }
}

// Function to toggle dropdown menus
function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    if (dropdown) {
        dropdown.classList.toggle('show');
    }
}

// Close dropdown when clicking outside
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        const dropdowns = document.getElementsByClassName('dropdown-content');
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

// Initialize page when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('AIUB Management System loaded successfully');
    
    // Add event listeners for forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Form submitted successfully!');
        });
    });
});