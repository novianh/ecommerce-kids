<div class="container">
    <form action="{{ route('front.contact.store') }}" method="post" >
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name:</label>
                    <input type="text" class="form-control rounded-5" id="exampleFormControlInput1" placeholder="name" name="name">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address:</label>
                    <input type="email" class="form-control rounded-5" id="exampleFormControlInput1"
                        placeholder="name@example.com" name="email">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment:</label>
                    <textarea class="form-control rounded-5" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                </div>
            </div>
        </div>
        <div class="row d-grid justify-content-end">
            <div class="col-3">
                <button type="submit" class="btn rounded-5 px-5 shadow">Send</button>
            </div>
        </div>
    </form>
</div>
