// Function to initialize signature pad for a canvas
function initSignaturePad(canvasId, inputId, clearBtnId) {
    const canvas = document.getElementById(canvasId);
    const input = document.getElementById(inputId);
    const clearBtn = document.getElementById(clearBtnId);
    if (!canvas || !input || !clearBtn) return;

    const ctx = canvas.getContext('2d');
    let drawing = false;
    let lastX = 0, lastY = 0;
    let savedImage = null;

    // Responsive canvas with redraw
    function resizeCanvas() {
        // Set a max width for mobile and desktop
        let width = canvas.parentElement ? canvas.parentElement.offsetWidth : 400;
        if (window.innerWidth < 600) {
            width = Math.min(width, 320); // mobile max width
        } else {
            width = Math.min(width, 500); // desktop max width
        }
        canvas.style.width = width + 'px';
        canvas.style.height = '150px'; // fixed height for all
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = width * ratio;
        canvas.height = 150 * ratio;
        ctx.setTransform(1, 0, 0, 1, 0, 0); // Reset transform
        ctx.scale(ratio, ratio);
        // Redraw saved image if exists
        if (savedImage) {
            ctx.drawImage(savedImage, 0, 0, canvas.width / ratio, canvas.height / ratio);
        } else if (input.value) {
            let img = new Image();
            img.onload = function() {
                ctx.drawImage(img, 0, 0, canvas.width / ratio, canvas.height / ratio);
                savedImage = img;
            };
            img.src = input.value;
        }
    }
    window.addEventListener('resize', resizeCanvas);

    // Initial render
    if (input.value) {
        let img = new Image();
        img.onload = function() {
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            savedImage = img;
        };
        img.src = input.value;
    }

    resizeCanvas();

    // Mouse events
    canvas.addEventListener('mousedown', (e) => {
        drawing = true;
        const rect = canvas.getBoundingClientRect();
        lastX = e.clientX - rect.left;
        lastY = e.clientY - rect.top;
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
    });
    canvas.addEventListener('mousemove', (e) => {
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(x, y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(x, y);
        lastX = x;
        lastY = y;
    });
    canvas.addEventListener('mouseup', () => {
        drawing = false;
        ctx.beginPath();
        input.value = canvas.toDataURL();
        // Save the drawn image for future redraws
        let img = new Image();
        img.src = input.value;
        savedImage = img;
    });
    canvas.addEventListener('mouseleave', () => {
        drawing = false;
        ctx.beginPath();
    });

    // Touch events
    canvas.addEventListener('touchstart', (e) => {
        e.preventDefault();
        drawing = true;
        const rect = canvas.getBoundingClientRect();
        const touch = e.touches[0];
        lastX = touch.clientX - rect.left;
        lastY = touch.clientY - rect.top;
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
    }, { passive: false });
    canvas.addEventListener('touchmove', (e) => {
        e.preventDefault();
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        const touch = e.touches[0];
        const x = touch.clientX - rect.left;
        const y = touch.clientY - rect.top;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(x, y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(x, y);
        lastX = x;
        lastY = y;
    }, { passive: false });
    canvas.addEventListener('touchend', (e) => {
        e.preventDefault();
        drawing = false;
        ctx.beginPath();
        input.value = canvas.toDataURL();
        // Save the drawn image for future redraws
        let img = new Image();
        img.src = input.value;
        savedImage = img;
    }, { passive: false });
    canvas.addEventListener('touchcancel', (e) => {
        e.preventDefault();
        drawing = false;
        ctx.beginPath();
    }, { passive: false });

    // Clear button functionality
    clearBtn.addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        input.value = '';
        savedImage = null;
    });
}

// Function to initialize signature pad for Acknowledge By field
function initAckSignaturePad(canvasId, inputId, clearBtnId) {
    const canvas = document.getElementById(canvasId);
    const input = document.getElementById(inputId);
    const clearBtn = document.getElementById(clearBtnId);
    if (!canvas || !input || !clearBtn) return;

    const ctx = canvas.getContext('2d');
    let drawing = false;
    let lastX = 0, lastY = 0;
    let savedImage = null;

    // Responsive canvas with redraw
    function resizeCanvas() {
        // Set a max width for mobile and desktop
        let width = canvas.parentElement ? canvas.parentElement.offsetWidth : 400;
        if (window.innerWidth < 600) {
            width = Math.min(width, 320); // mobile max width
        } else {
            width = Math.min(width, 500); // desktop max width
        }
        canvas.style.width = width + 'px';
        canvas.style.height = '150px'; // fixed height for all
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = width * ratio;
        canvas.height = 150 * ratio;
        ctx.setTransform(1, 0, 0, 1, 0, 0); // Reset transform
        ctx.scale(ratio, ratio);
        // Redraw saved image if exists
        if (savedImage) {
            ctx.drawImage(savedImage, 0, 0, canvas.width / ratio, canvas.height / ratio);
        } else if (input.value) {
            let img = new Image();
            img.onload = function() {
                ctx.drawImage(img, 0, 0, canvas.width / ratio, canvas.height / ratio);
                savedImage = img;
            };
            img.src = input.value;
        }
    }
    window.addEventListener('resize', resizeCanvas);

    // Initial render
    if (input.value) {
        let img = new Image();
        img.onload = function() {
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            savedImage = img;
        };
        img.src = input.value;
    }

    resizeCanvas();

    // Mouse events
    canvas.addEventListener('mousedown', (e) => {
        drawing = true;
        const rect = canvas.getBoundingClientRect();
        lastX = e.clientX - rect.left;
        lastY = e.clientY - rect.top;
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
    });
    canvas.addEventListener('mousemove', (e) => {
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(x, y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(x, y);
        lastX = x;
        lastY = y;
    });
    canvas.addEventListener('mouseup', () => {
        drawing = false;
        ctx.beginPath();
        input.value = canvas.toDataURL();
        // Save the drawn image for future redraws
        let img = new Image();
        img.src = input.value;
        savedImage = img;
    });
    canvas.addEventListener('mouseleave', () => {
        drawing = false;
        ctx.beginPath();
    });

    // Touch events
    canvas.addEventListener('touchstart', (e) => {
        e.preventDefault();
        drawing = true;
        const rect = canvas.getBoundingClientRect();
        const touch = e.touches[0];
        lastX = touch.clientX - rect.left;
        lastY = touch.clientY - rect.top;
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
    }, { passive: false });
    canvas.addEventListener('touchmove', (e) => {
        e.preventDefault();
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        const touch = e.touches[0];
        const x = touch.clientX - rect.left;
        const y = touch.clientY - rect.top;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(x, y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(x, y);
        lastX = x;
        lastY = y;
    }, { passive: false });
    canvas.addEventListener('touchend', (e) => {
        e.preventDefault();
        drawing = false;
        ctx.beginPath();
        input.value = canvas.toDataURL();
        // Save the drawn image for future redraws
        let img = new Image();
        img.src = input.value;
        savedImage = img;
    }, { passive: false });
    canvas.addEventListener('touchcancel', (e) => {
        e.preventDefault();
        drawing = false;
        ctx.beginPath();
    }, { passive: false });

    // Clear button functionality
    clearBtn.addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        input.value = '';
        savedImage = null;
    });
}

// Initialize signature pads after DOM is ready
window.addEventListener('DOMContentLoaded', function() {
    initSignaturePad('clientSignature', 'signatureInput', 'clearSignature');
    initSignaturePad('personnelSignature', 'signaturePersonnelInput', 'clearPersonnelSignature');
    initAckSignaturePad('ackSignature', 'signatureAckInput', 'clearAckSignature');
});

// Signature Pad for Acknowledge By
const ackCanvas = document.getElementById('ackSignature');
const ackCtx = ackCanvas.getContext('2d');
let ackDrawing = false;
let ackLastX = 0;
let ackLastY = 0;

ackCanvas.addEventListener('mousedown', function(e) {
    ackDrawing = true;
    [ackLastX, ackLastY] = [e.offsetX, e.offsetY];
});
ackCanvas.addEventListener('mousemove', function(e) {
    if (!ackDrawing) return;
    ackCtx.beginPath();
    ackCtx.moveTo(ackLastX, ackLastY);
    ackCtx.lineTo(e.offsetX, e.offsetY);
    ackCtx.stroke();
    [ackLastX, ackLastY] = [e.offsetX, e.offsetY];
});
ackCanvas.addEventListener('mouseup', function() {
    ackDrawing = false;
    updateAckSignatureInput();
});
ackCanvas.addEventListener('mouseleave', function() {
    ackDrawing = false;
    updateAckSignatureInput();
});

document.getElementById('clearAckSignature').addEventListener('click', function() {
    ackCtx.clearRect(0, 0, ackCanvas.width, ackCanvas.height);
    updateAckSignatureInput();
});

function updateAckSignatureInput() {
    const dataUrl = ackCanvas.toDataURL();
    document.getElementById('signatureAckInput').value = dataUrl;
}