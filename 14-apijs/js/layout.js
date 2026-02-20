document.addEventListener('DOMContentLoaded', function () {
		// Ayudante para mostrar una vista con una transición de desvanecimiento simple y ocultar la actual
	function showView(id) {
		const DURATION = 320; // ms, desvanecimiento más suave
		const current = document.querySelector('main:not(.hide)');
		const target = document.getElementById(id);
		if (!target) return;
		if (current && current.id === id) return; // ya visible

		// Desvanecer la vista actual
		if (current) {
			current.classList.add('fade-out');
			// después de la transición, ocúltala y limpia las clases
			setTimeout(() => {
				current.classList.add('hide');
				current.classList.remove('fade-out');
			}, DURATION);
		}

		// Preparar destino: hacerlo visible pero comenzar invisible para el desvanecimiento
		target.classList.remove('hide');
		target.classList.add('fade-in');
		// permite que el navegador pinte el estado inicial, luego inicia la transición
		requestAnimationFrame(() => requestAnimationFrame(() => {
			target.classList.add('in');
		}));

		// limpiar clases después de la animación
		setTimeout(() => {
			target.classList.remove('fade-in', 'in');
		}, DURATION + 20);
	}

	// Ayudante simple para encontrar la fila más cercana y extraer nombre/tipo
	function getRowInfo(element) {
		const row = element.closest('.row');
		if (!row) return {};
		const nameEl = row.querySelector('h3');
		const kindEl = row.querySelector('h4');
		const name = nameEl ? nameEl.textContent.trim() : '';
		// intenta extraer el texto de tipo antes de cualquier dos puntos
		let kind = '';
		if (kindEl) {
			const t = kindEl.textContent.trim();
			kind = t.split(':')[0] ? t.split(':')[0].trim() : t;
		}
		return { name, kind, row };
	}

	// Inicio de sesión -> Panel de control
	const loginForm = document.querySelector('#login form');
	if (loginForm) {
		const btn = loginForm.querySelector('button');
		btn && btn.addEventListener('click', function (e) {
			e.preventDefault();
			showView('dashboard');
		});
	}

	// Botones del panel: agregar, cerrar sesión
	const btnAdd = document.querySelector('#dashboard .btnAdd');
	const btnLogout = document.querySelector('#dashboard .btnLogout');
	btnAdd && btnAdd.addEventListener('click', function (e) {
		e.preventDefault();
		showView('add');
	});
	btnLogout && btnLogout.addEventListener('click', function (e) {
		e.preventDefault();
		showView('login');
	});

	// Acciones de lista del panel (delegación)
	const dashboard = document.getElementById('dashboard');
	if (dashboard) {
		dashboard.addEventListener('click', function (e) {
			const showBtn = e.target.closest('a.show');
			const editBtn = e.target.closest('a.edit');
			const deleteBtn = e.target.closest('a.delete');
			if (showBtn) {
				e.preventDefault();
				const info = getRowInfo(showBtn);
				// completar campos simples en la vista mostrar si están presentes
				const nameEl = document.querySelector('#show .value.name');
				const kindEl = document.querySelector('#show .value.kind');
				if (nameEl && info.name) nameEl.textContent = info.name;
				if (kindEl && info.kind) kindEl.textContent = info.kind;
				showView('show');
			} else if (editBtn) {
				e.preventDefault();
				const info = getRowInfo(editBtn);
				const eName = document.querySelector('#edit .e-name');
				const eKind = document.querySelector('#edit .e-kind');
				if (eName && info.name) eName.value = info.name;
				if (eKind && info.kind) eKind.value = info.kind;
				showView('edit');
			} else if (deleteBtn) {
				e.preventDefault();
				const info = getRowInfo(deleteBtn);
				if (confirm('Are you sure you want to delete "' + (info.name || 'this item') + '"?')) {
					// eliminar la fila de la lista
					if (info.row) info.row.remove();
				}
			}
		});
	}

	// Botones de la vista Agregar
	const addView = document.getElementById('add');
	if (addView) {
		const addBtn = addView.querySelector('.addBtn');
		const cancelBtn = addView.querySelector('.cancelBtn');
		addBtn && addBtn.addEventListener('click', function (e) {
			e.preventDefault();
			// En una aplicación real recopilaríamos datos y los enviaríamos al servidor. Aquí simplemente volvemos atrás.
			showView('dashboard');
		});
		cancelBtn && cancelBtn.addEventListener('click', function (e) {
			e.preventDefault();
			showView('dashboard');
		});
	}

	// Botones de la vista Editar
	const editView = document.getElementById('edit');
	if (editView) {
		const saveBtn = editView.querySelector('.saveBtn');
		const cancelBtn = editView.querySelector('.e-cancel');
		saveBtn && saveBtn.addEventListener('click', function (e) {
			e.preventDefault();
			// Guardaría los cambios; aquí volvemos al panel
			showView('dashboard');
		});
		cancelBtn && cancelBtn.addEventListener('click', function (e) {
			e.preventDefault();
			showView('dashboard');
		});
	}

	// Botones atrás dentro de encabezados (mostrar/editar/agregar)
	document.querySelectorAll('a.btnBack').forEach(function (btn) {
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			showView('dashboard');
		});
	});

	// En la primera carga, asegúrate de que el inicio de sesión sea visible
	showView('login');
});

