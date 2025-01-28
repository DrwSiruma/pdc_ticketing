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

    function showLoaderThenSubmit() {
        if (loader) loader.style.display = "block"; // Show the loader
        setTimeout(() => {
            form.submit();
        }, 1800);
    }
});