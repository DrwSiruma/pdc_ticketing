<?php include('user.header.php'); ?>
    <style>
        ol,
        ul {
            list-style: none;
        }
    </style>

    <!-- char-area -->
    <section class="message-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chat-area">
                        <!-- chatlist -->
                        <div class="chatlist">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="chat-header">
                                        <div class="msg-search">
                                            <h5 class="m-0">Conversations</h5>
                                        </div>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="Open-tab" data-toggle="tab" data-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Open</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="Closed-tab" data-toggle="tab" data-target="#Closed" type="button" role="tab" aria-controls="Closed" aria-selected="false">Closed</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="modal-body" style="padding: 0px;">
                                        <!-- chat-list -->
                                        <div class="chat-lists">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                    <!-- chat-list -->
                                                    <div class="chat-list">
                                                        <a href="#" class="d-flex align-items-center chat-item">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid img-avatar" src="../../img/customer-support.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>PDCS1024001</h3>
                                                                <p>Open</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center chat-item">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid img-avatar" src="../../img/customer-support.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>PDCS1024002</h3>
                                                                <p>Open</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center chat-item">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid img-avatar" src="../../img/customer-support.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>PDCS1024003</h3>
                                                                <p>Open</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center chat-item">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid img-avatar" src="../../img/customer-support.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>PDCS1124001</h3>
                                                                <p>Open</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center chat-item">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid img-avatar" src="../../img/customer-support.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>PDCS1124002</h3>
                                                                <p>Open</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center chat-item">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid img-avatar" src="../../img/customer-support.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>PDCS1124003</h3>
                                                                <p>Open</p>
                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!-- chat-list -->
                                                </div>
                                                <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="Closed-tab">

                                                    <!-- chat-list -->
                                                    <div class="chat-list" style="padding: 1rem;">
                                                        <span style="font-style: italic;">No conversation.</span>
                                                    </div>
                                                    <!-- chat-list -->
                                                     
                                                </div>
                                            </div>

                                        </div>
                                        <!-- chat-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chatlist -->



                        <!-- chatbox -->
                        <div class="chatbox">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="msg-head">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center chat-item">
                                                    <span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
                                                    <div class="flex-shrink-0">
                                                        <img class="img-fluid img-avatar" src="../../img/customer-support.png" alt="user img">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h3>PDCS1024001</h3>
                                                        <p>Open</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <div class="msg-body">
                                            <ul>
                                                <li class="sender">
                                                    <p> Hey, Are you there? </p>
                                                    <span class="time">10:06 am</span>
                                                </li>
                                                <li class="sender">
                                                    <p> Hey, Are you there? </p>
                                                    <span class="time">10:16 am</span>
                                                </li>
                                                <li class="reply">
                                                    <p>yes!</p>
                                                    <span class="time">10:20 am</span>
                                                </li>
                                                <li class="sender">
                                                    <p> Hey, Are you there? </p>
                                                    <span class="time">10:26 am</span>
                                                </li>
                                                <li class="sender">
                                                    <p> Hey, Are you there? </p>
                                                    <span class="time">10:32 am</span>
                                                </li>
                                                <li class="reply">
                                                    <p>How are you?</p>
                                                    <span class="time">10:35 am</span>
                                                </li>
                                                <li>
                                                    <div class="divider">
                                                        <h6>Today</h6>
                                                    </div>
                                                </li>

                                                <li class="reply">
                                                    <p> yes, tell me</p>
                                                    <span class="time">10:36 am</span>
                                                </li>
                                                <li class="reply">
                                                    <p>yes... on it</p>
                                                    <span class="time">just now</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>


                                    <div class="send-box">
                                        <form action="">
                                            <input type="text" class="form-control" aria-label="message…" placeholder="Write message…">

                                            <button type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatbox -->


                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- char-area -->

<?php include('user.footer.php'); ?>