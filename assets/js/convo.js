jQuery(document).ready(function() {

    $(".chat-list a").click(function() {
        $(".chatbox").addClass('showbox');
        return false;
    });

    $(".chat-icon").click(function() {
        $(".chatbox").removeClass('showbox');
    });


});

document.addEventListener("DOMContentLoaded", () => {
    const msgBody = document.querySelector(".msg-body ul");
    
    // Scroll to the bottom on load
    msgBody.scrollTop = msgBody.scrollHeight;
});

// Optional: Scroll to bottom on new message (if needed in real-time chat)
// Example: Call this function whenever a new message is added
function scrollToBottom() {
    const msgBody = document.querySelector(".msg-body ul");
    msgBody.scrollTop = msgBody.scrollHeight;
}