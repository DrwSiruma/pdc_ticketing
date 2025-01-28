// Function to initialize signature pad for a canvas
function initSignaturePad(canvasId, inputId, clearBtnId) {
    const canvas = document.getElementById(canvasId);
    const input = document.getElementById(inputId);
    const clearBtn = document.getElementById(clearBtnId);

    const ctx = canvas.getContext('2d');
    let drawing = false;

    // Start drawing
    canvas.addEventListener('mousedown', () => { drawing = true; });
    canvas.addEventListener('mouseup', () => {
        drawing = false;
        input.value = canvas.toDataURL(); // Save signature to hidden input
    });
    canvas.addEventListener('mousemove', (e) => {
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
    });

    // Clear button functionality
    clearBtn.addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        input.value = ''; // Clear hidden input
    });
}

// Initialize signature pads
initSignaturePad('clientSignature', 'signatureInput', 'clearSignature');
initSignaturePad('personnelSignature', 'signaturePersonnelInput', 'clearPersonnelSignature');