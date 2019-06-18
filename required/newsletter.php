<?php
echo <<<_e
<!-- Newsletter Section-->
<div class="row" style="padding: 0px 15px;margin: 40px 0;">
    <div class="col s12" style="border: 1px dotted #000;">
        <blockquote>
            <h4>Newsletter</h4>
        </blockquote>
        <p>Signup to our newsletter to receive notifications of our latest products</p>
        <div class="input-field col s12">
            <input type="email" id="email" name="email" class="validate" />
            <label for="email">Your E-mail</label>
        </div>
        <p><a class="btn waves-effect black hoverable" id="submitNewsletter">Signup</a></p>
    </div>
</div>
_e;
