<div class="container">
    <p  style="color: #8CC0DE"><small id="success-message"></small></p>
    <form  id="contactForm">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name:</label>
                    <input type="text" id="name" class="form-control rounded-5" placeholder="name" name="name">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address:</label>
                    <input type="email" id="email" class="form-control rounded-5" 
                        placeholder="name@example.com" name="email">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment:</label>
                    <textarea class="form-control rounded-5" id="message" rows="3" name="message"></textarea>
                </div>
            </div>
        </div>
        <div class="row d-grid justify-content-end">
            <div class="col-3">
                <button id="submit" class="btn rounded-5 px-5 shadow">Send</button>
            </div>
        </div>
    </form>
</div>
