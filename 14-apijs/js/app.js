// API Configuration
const API_URL = 'http://127.0.0.1:8000/api';
let currentUser = null;
let currentPetId = null;
let allPets = [];

// Initialize app
document.addEventListener('DOMContentLoaded', () => {
    checkLogin();
    attachEventListeners();
});

// Check if user is logged in
function checkLogin() {
    const token = localStorage.getItem('api_token');
    if (token) {
        showDashboard();
    } else {
        showLogin();
    }
}

// Switch between views
function switchView(viewName) {
    const views = ['login', 'dashboard', 'add', 'show', 'edit'];
    views.forEach(view => {
        document.getElementById(view).classList.toggle('hide', view !== viewName);
    });
}

function showLogin() {
    switchView('login');
}

async function showDashboard() {
    switchView('dashboard');
    await loadPets();
}

function showAdd() {
    switchView('add');
    clearAddForm();
}

function showPetDetails() {
    switchView('show');
}

function showEditPet() {
    switchView('edit');
}

// Attach event listeners
function attachEventListeners() {
    const loginBtn = document.getElementById('btnLogin');
    if (loginBtn) loginBtn.addEventListener('click', handleLogin);
    
    const backBtns = document.querySelectorAll('.btnBack');
    backBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            showDashboard();
        });
    });
    
    const addBtn = document.querySelector('.btnAdd');
    if (addBtn) {
        addBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showAdd();
        });
    }
    
    const logoutBtn = document.querySelector('.btnLogout');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            handleLogout();
        });
    }
    
    const addForm = document.querySelector('#add form');
    if (addForm) {
        const addBtnForm = addForm.querySelector('.addBtn');
        const cancelBtnForm = addForm.querySelector('.cancelBtn');
        
        if (addBtnForm) addBtnForm.addEventListener('click', handleAddPet);
        if (cancelBtnForm) {
            cancelBtnForm.addEventListener('click', (e) => {
                e.preventDefault();
                showDashboard();
            });
        }
    }
    
    const editForm = document.querySelector('#edit form');
    if (editForm) {
        const saveBtnForm = editForm.querySelector('.saveBtn');
        const cancelBtnEdit = editForm.querySelector('.e-cancel');
        
        if (saveBtnForm) saveBtnForm.addEventListener('click', handleEditPet);
        if (cancelBtnEdit) {
            cancelBtnEdit.addEventListener('click', (e) => {
                e.preventDefault();
                showDashboard();
            });
        }
    }
}

// Handle login
async function handleLogin(e) {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    if (!email || !password) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill in all fields'
        });
        return;
    }
    
    try {
        const response = await fetch(`${API_URL}/auth/login`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        });
        
        const data = await response.json();
        
        if (response.ok) {
            // Save token and user data
            localStorage.setItem('api_token', data.token);
            localStorage.setItem('user', JSON.stringify(data.user));
            currentUser = data.user;
            
            // Clear form
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Login successful!',
                timer: 1500
            });
            
            // Show dashboard
            showDashboard();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Login failed'
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Network error: ' + error.message
        });
    }
}

// Handle logout
async function handleLogout() {
    const token = localStorage.getItem('api_token');
    
    try {
        await fetch(`${API_URL}/auth/logout`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        });
    } catch (error) {
        // Logout error doesn't matter, we clear local storage anyway
    }
    
    localStorage.removeItem('api_token');
    localStorage.removeItem('user');
    currentUser = null;
    
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Logged out successfully!',
        timer: 1500
    });
    
    showLogin();
}

// Load all pets
async function loadPets() {
    const token = localStorage.getItem('api_token');
    
    try {
        const response = await fetch(`${API_URL}/pets`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        });
        
        const data = await response.json();
        
        if (response.ok) {
            allPets = data.pets || [];
            renderPets();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Failed to load pets'
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Network error: ' + error.message
        });
    }
}

// Render pets in dashboard
function renderPets() {
    const listContainer = document.querySelector('#dashboard > section.list');
    if (!listContainer) return;
    
    const petRows = document.querySelectorAll('.list .row');
    petRows.forEach(row => row.remove());
    
    allPets.forEach(pet => {
        const row = document.createElement('div');
        row.className = 'row';
        row.innerHTML = `
            <img src="imgs/pett.png" alt="${pet.name}" class="pet-img">
            <div class="data">
                <h3>${pet.name || 'Unknown'}</h3>
                <h4>${pet.kind || 'Unknown'}: ${pet.breed || 'N/A'}</h4>
            </div>
            <nav class="actions">
                <button class="action-btn show" data-id="${pet.id}" title="View details">
                    <img src="imgs/lupa.svg" alt="View">
                </button>
                <button class="action-btn edit" data-id="${pet.id}" title="Edit pet">
                    <img src="imgs/lapiz.svg" alt="Edit">
                </button>
                <button class="action-btn delete" data-id="${pet.id}" title="Delete pet">
                    <img src="imgs/basura.svg" alt="Delete">
                </button>
            </nav>
        `;
        
        row.querySelector('.show').addEventListener('click', (e) => {
            e.preventDefault();
            showPetDetailsView(pet.id);
        });
        
        row.querySelector('.edit').addEventListener('click', (e) => {
            e.preventDefault();
            showEditPetView(pet.id);
        });
        
        row.querySelector('.delete').addEventListener('click', (e) => {
            e.preventDefault();
            handleDeletePet(pet.id);
        });
        
        listContainer.appendChild(row);
    });
}

// Show pet details
function showPetDetailsView(petId) {
    const pet = allPets.find(p => p.id === petId);
    
    if (!pet) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Pet not found'
        });
        return;
    }
    
    currentPetId = petId;
    
    // Update show view with pet data
    document.querySelector('#show .name').textContent = pet.name || '';
    document.querySelector('#show .kind').textContent = pet.kind || '';
    document.querySelector('#show .weight').textContent = pet.weight || '';
    document.querySelector('#show .age').textContent = pet.age || '';
    document.querySelector('#show .breed').textContent = pet.breed || '';
    document.querySelector('#show .location').textContent = pet.location || '';
    document.querySelector('#show .description').textContent = pet.description || '';
    
    showPetDetails();
}

// Show edit pet form
function showEditPetView(petId) {
    const pet = allPets.find(p => p.id === petId);
    
    if (!pet) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Pet not found'
        });
        return;
    }
    
    currentPetId = petId;
    
    // Fill edit form with pet data
    document.querySelector('#edit .e-name').value = pet.name || '';
    document.querySelector('#edit .e-kind').value = pet.kind || '';
    document.querySelector('#edit .e-weight').value = pet.weight || '';
    document.querySelector('#edit .e-age').value = pet.age || '';
    document.querySelector('#edit .e-breed').value = pet.breed || '';
    document.querySelector('#edit .e-location').value = pet.location || '';
    document.querySelector('#edit .e-description').value = pet.description || '';
    
    showEditPet();
}

// Handle add pet
async function handleAddPet(e) {
    e.preventDefault();
    
    const name = document.querySelector('#add [name="name"]')?.value || '';
    const kind = document.querySelector('#add [name="kind"]')?.value || '';
    const weight = document.querySelector('#add [name="weight"]')?.value || '';
    const age = document.querySelector('#add [name="age"]')?.value || '';
    const breed = document.querySelector('#add [name="breed"]')?.value || '';
    const location = document.querySelector('#add [name="location"]')?.value || '';
    const description = document.querySelector('#add [name="description"]')?.value || '';
    
    if (!name.trim() || !kind.trim() || !weight.trim() || !age.trim() || !breed.trim() || !location.trim()) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor completa todos los campos requeridos'
        });
        return;
    }
    
    if (isNaN(parseFloat(weight)) || isNaN(parseInt(age))) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Peso y edad deben ser números'
        });
        return;
    }
    
    const token = localStorage.getItem('api_token');
    if (!token) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Token no encontrado. Por favor inicia sesión de nuevo'
        });
        return;
    }
    
    try {
        const response = await fetch(`${API_URL}/pets`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                name: name.trim(),
                kind: kind.trim(),
                weight: parseFloat(weight),
                age: parseInt(age),
                breed: breed.trim(),
                location: location.trim(),
                description: description.trim()
            })
        });
        
        const data = await response.json();
        
        if (response.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '¡Mascota agregada correctamente!',
                timer: 1500
            }).then(() => {
                clearAddForm();
                loadPets().then(() => showDashboard());
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Error al agregar la mascota'
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error de red',
            text: 'Error: ' + error.message
        });
    }
}

// Handle edit pet
async function handleEditPet(e) {
    e.preventDefault();
    
    const name = document.querySelector('#edit .e-name').value;
    const kind = document.querySelector('#edit .e-kind').value;
    const weight = document.querySelector('#edit .e-weight').value;
    const age = document.querySelector('#edit .e-age').value;
    const breed = document.querySelector('#edit .e-breed').value;
    const location = document.querySelector('#edit .e-location').value;
    const description = document.querySelector('#edit .e-description').value;
    
    if (!name || !kind || !breed || !location) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill in required fields'
        });
        return;
    }
    
    const token = localStorage.getItem('api_token');
    
    try {
        const response = await fetch(`${API_URL}/pets/${currentPetId}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                name: name,
                kind: kind,
                weight: parseFloat(weight) || 0,
                age: parseInt(age) || 0,
                breed: breed,
                location: location,
                description: description
            })
        });
        
        const data = await response.json();
        
        if (response.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Pet updated successfully!',
                timer: 1500
            });
            
            await loadPets();
            showDashboard();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Failed to update pet'
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Network error: ' + error.message
        });
    }
}

// Handle delete pet
async function handleDeletePet(petId) {
    Swal.fire({
        title: 'Delete Pet?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    }).then(async (result) => {
        if (result.isConfirmed) {
            const token = localStorage.getItem('api_token');
            
            try {
                const response = await fetch(`${API_URL}/pets/${petId}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted',
                        text: 'Pet deleted successfully!',
                        timer: 1500
                    });
                    
                    await loadPets();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to delete pet'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Network error: ' + error.message
                });
            }
        }
    });
}

// Clear add form
function clearAddForm() {
    const fields = ['name', 'kind', 'weight', 'age', 'breed', 'location', 'description'];
    fields.forEach(field => {
        const input = document.querySelector(`#add [name="${field}"]`);
        if (input) input.value = '';
    });
}
