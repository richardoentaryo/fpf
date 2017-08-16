<div class="col-md-9">
    <p class="lead">
        <b>Encryption User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>Binary Level Encryption</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    FPF encryption reference class uses openssl encryption method from PHP.
                    Binary level encryption uses pure result of returned data from open_ssl that contains special characters.
                    That's why the value won't be able to stored inside database. Binary level works best with system interconnected data passes like: data from POST method.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Encryption::encodeString($string); <br>
                        Encryption::decodestring($encodedString);
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Database Friendly Encryption</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Database friendly encryption also uses openssl encryption method just like binary level encryption, only the difference is the final result will be converted back into string.
                    Because the result now in string forms and contains no special characters, it is compatible with database which best utilized for encrypting user passwords in database.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Encryption::safeEncrypt($string); <br>
                        Encryption::safeDecrypt($encodedString);
                    </span>
                </div>
            </div>

        </div>

    </div>

</div>
