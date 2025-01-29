function showNotification(message, type = 'success') {
    const container = document.getElementById('notification-container');  
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `w-full text-center transition-all duration-500 transform overflow-hidden bg-${type === 'success' ? 'success' : 'error'} text-secondary px-4 py-3 rounded-sm opacity-0 max-h-0`;
    notification.textContent = message;
    container.appendChild(notification);
    container.classList.add('my-2')
    notification.offsetHeight;

    notification.classList.remove('opacity-0', 'max-h-0');
    notification.classList.add('opacity-100', 'max-h-40'); 

    // Automatically hide notification after 3 seconds
    setTimeout(() => {
        notification.classList.remove('opacity-100', 'max-h-40');
        notification.classList.add('opacity-0', 'max-h-0');
        
        // Remove the notification after animation
        setTimeout(() => {
            notification.remove();
            container.classList.remove('my-2')

        }, 500); // This matches the transition duration
    }, 3000);
}