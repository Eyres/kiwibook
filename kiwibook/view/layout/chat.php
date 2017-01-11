<div id="chat-window" class="hidden">
    <form name="form" method="post">
        <label title="message" class="col-sm-2 control-label required" for="message">
            Votre message
        </label>
        <div class="col-sm-10">
            <textarea id="message" name="message" required="required"
                      class="form-control"></textarea>
        </div>
        <button type="button" id="envoyer-chat" class="btn btn-lg"
                value="Envoyer">
            <span>Envoyer</span>
        </button>
    </form>

    <div class="container-fluid" id="target-chat">

    </div>
</div>
