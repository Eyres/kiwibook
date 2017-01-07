<div class="row">
    <div class="col-xs-12">
        <form name="form" method="post" class="form-horizontal"
              action="?action=editProfil"
              enctype="multipart/form-data">
            <div class="form-group">
                <label title="Statut" class="col-sm-2 control-label" for="statut">Statut</label>
                <div class="col-sm-10">
                    <input type="text" id="statut" name="statut" placeholder="Statut" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label title="Avatar" class="col-sm-2 control-label" for="avatar">Avatar</label>
                <div class="col-sm-10">
                    <input type="file" id="avatar" name="avatar"/>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" id="submit-edit" name="envoyer" class="btn btn-defaut" value="Valider">
                    Valider
                </button>
            </div>
        </form>
    </div>
</div>
