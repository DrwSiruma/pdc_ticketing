document.addEventListener("DOMContentLoaded", function () {
    // Get the 'tab' parameter from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const activeTab = urlParams.get('tab');

    if (activeTab) {
        // Define a mapping between tab parameter values and their corresponding tab IDs
        const tabMapping = {
            'open': 'ex-with-icons-tab-1',
            'overdue': 'ex-with-icons-tab-2',
            'closed': 'ex-with-icons-tab-3'
        };

        // Get the tab link and tab content elements based on the mapping
        const targetTabLink = document.getElementById(tabMapping[activeTab]);
        const targetTabContent = document.querySelector(targetTabLink.getAttribute('data-target'));

        if (targetTabLink && targetTabContent) {
            // Deactivate the current active tab
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));

            // Activate the desired tab
            targetTabLink.classList.add('active');
            targetTabContent.classList.add('show', 'active');
        }
    }
});