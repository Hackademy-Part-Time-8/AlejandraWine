<br><br><br><br><br>
<footer class="container-footer">
    <div class="contact-container">
        <h1>Contact us!</h1>
        <x-message code="{{ Session::get('code') }}" message="{{ Session::get('message') }}" />
        <div class=row>
            <form method="POST" action="">
                <!-- csrf es una validacion de seguriad. Viene dentro de laravel ya creada-->
                @csrf
                <div class="d-flex gap-2 wide w-100 ">
                    <div class="mb-3">
                        <input type="name" class="form-control" id="name" name="name"
                            aria-describedby="nameHelp"placeholder="Name">
                    </div>
                    <div>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp"
                            placeholder="Email - We'll never share your email with anyone else." style="width: 32vw">
                    </div>
                </div>


                <div class="mb-3">
                    <textarea name="message" type="message" class="form-control" id="message"
                        placeholder="What would you like to tell us"></textarea>
                </div>

                <div class="d-flex gap-5 ">
                    <div class="mb-3 form-check mt-2 ">
                        <input type="checkbox" class="form-check-input" id="check" name="check">
                        <label class="form-check-label" for="exampleCheck1">"I agree to the terms and
                            conditions."</label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <div class="copy-redes-container">
        <ul class="redes-footer">
            <li><a href="https://www.github.com/alejandra-garcias"><img src="/img/github.svg" alt=""></a></li>
            <li><a href="https://www.linkedin.com/in/alejandra-garcia-sanchez-2513a212a/"><img src="/img/linkedin.svg"
                        alt=""></a></li>
            <li><a href="mailto:algasa-97@hotmail.com"><img src="/img/email.svg" alt=""></a></li>
        </ul>
        <div class="copy-footer">
            &copy; {{ env('APP_COPY') }}
        </div>
    </div>
</footer>
