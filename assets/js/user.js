// Function to toggle formatting and update the button's active state
function toggleStyle(command) {
    document.execCommand(command, false, null);
    updateButtonStates();
}

// Function to check if the format is applied and update button states
function updateButtonStates() {
    // Query all format buttons
    const buttons = document.querySelectorAll('.format-btn');
    buttons.forEach(button => {
        const command = button.getAttribute('data-command');
        // Toggle the 'active' class if the command is currently active
        if (document.queryCommandState(command)) {
            button.classList.add('active');
        } else {
            button.classList.remove('active');
        }
    });
}

function copyDescription() {
    // Get the content of the contenteditable div and set it in the hidden input
    const description = document.getElementById('form_description').innerHTML;
    document.getElementById('description_input').value = description;
}

// Add event listener to update button states when cursor moves in contenteditable div
const formDescription = document.getElementById("form_description");
if (formDescription) {
    formDescription.addEventListener("keyup", updateButtonStates);
    formDescription.addEventListener("mouseup", updateButtonStates);
}

// Function to save the content of the contenteditable div to the hidden input before submitting
function saveDescription() {
    const descriptionContent = document.getElementById("form_description").innerHTML;
    document.getElementById("description_input").value = descriptionContent;
}

document.addEventListener('DOMContentLoaded', function () {
    const formDesignation = document.getElementById('form_designation');
    const formTopic = document.getElementById('form_topic');
    const formItem = document.getElementById('form_item');

    if (formDesignation && formTopic && formItem) {
        // Fetch topics based on designation
        formDesignation.addEventListener('change', function () {
            formTopic.disabled = !formDesignation.value;
            formItem.disabled = true;
            formTopic.innerHTML = '<option value="" selected disabled>--Select a Help Topic--</option>';
            formItem.innerHTML = '<option value="" selected disabled>--Select an Item Topic--</option>';

            if (formDesignation.value) {
                fetchTopics(formDesignation.value);
            }
        });

        // Fetch items based on selected topic
        formTopic.addEventListener('change', function () {
            formItem.disabled = !formTopic.value;
            formItem.innerHTML = '<option value="" selected disabled>--Select an Item Topic--</option>';

            if (formTopic.value) {
                fetchItems(formDesignation.value, formTopic.value);
            }
        });
    }

    // Function to fetch topics based on designation
    function fetchTopics(designation) {
        fetch(`fetch_topics.php?designation=${designation}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(topic => {
                    const option = document.createElement('option');
                    option.value = topic.id;
                    option.textContent = topic.name;
                    formTopic.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching topics:', error));
    }

    // Function to fetch items based on designation and topic
    function fetchItems(designation, topic) {
        fetch(`fetch_items.php?designation=${designation}&topic=${topic}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    formItem.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching items:', error));
    }
});