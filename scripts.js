document.addEventListener('DOMContentLoaded', function () {
    const containerList = document.getElementById('container-list');

    // Initialize SortableJS for drag-and-drop functionality
    new Sortable(containerList, {
        animation: 150,
        ghostClass: 'ghost',
        dragClass: 'dragging',
        handle: '.box',
    });
});

function toggleContainerVisibility(containerId) {
    const container = document.getElementById(containerId);
    container.classList.add('hidden');

    // Add hidden container to hidden container list
    const hiddenContainerList = document.getElementById('hidden-container-list');
    const hiddenContainer = document.createElement('div');
    hiddenContainer.className = 'hidden-container';
    hiddenContainer.id = 'hidden-' + containerId;
    hiddenContainer.innerHTML = `
        <span>${container.querySelector('.container-name').innerText}</span>
        <button class='show-button' onclick='showContainer("${containerId}")'>Show</button>
    `;
    hiddenContainerList.appendChild(hiddenContainer);
}

function showContainer(containerId) {
    const container = document.getElementById(containerId);
    container.classList.remove('hidden');

    // Remove corresponding hidden container element
    const hiddenContainer = document.getElementById('hidden-' + containerId);
    if (hiddenContainer) hiddenContainer.remove();
}

function toggleAllContainers() {
    const containers = document.querySelectorAll('.box');
    containers.forEach(container => {
        if (container.classList.contains('hidden')) {
            showContainer(container.id);
        } else {
            toggleContainerVisibility(container.id);
        }
    });
}

function showHiddenContainers() {
    const hiddenContainers = document.querySelectorAll('.hidden-container');
    hiddenContainers.forEach(hiddenContainer => {
        const containerId = hiddenContainer.id.replace('hidden-', '');
        showContainer(containerId);
    });
}
