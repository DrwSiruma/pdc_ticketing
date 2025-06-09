document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("ticketForm");
    const loader = document.getElementById("loader");

    // Save Report Button
    document.getElementById("saveReportBtn").addEventListener("click", () => {
        document.getElementById("actionType").value = "save";
        showLoaderThenSubmit();
    });

    // Finish Report Button
    document.getElementById("finishReportBtn").addEventListener("click", () => {
        $("#confirmFinishModal").modal("show");
    });

    // Confirm Finish Button in Modal
    document.getElementById("confirmFinishBtn").addEventListener("click", () => {
        $("#confirmFinishModal").modal("hide");
        document.getElementById("actionType").value = "finish";
        showLoaderThenSubmit();
    });

    function updateSignatures() {
        // Client signature
        var clientCanvas = document.getElementById('clientSignature');
        var clientInput = document.getElementById('signatureInput');
        if (clientCanvas && clientInput) {
            clientInput.value = clientCanvas.toDataURL();
        }
        // Personnel signature
        var personnelCanvas = document.getElementById('personnelSignature');
        var personnelInput = document.getElementById('signaturePersonnelInput');
        if (personnelCanvas && personnelInput) {
            personnelInput.value = personnelCanvas.toDataURL();
        }
    }

    function showLoaderThenSubmit() {
        updateSignatures(); // Ensure signatures are up-to-date
        if (loader) loader.style.display = "block"; // Show the loader
        setTimeout(() => {
            form.submit();
        }, 1800);
    }
});