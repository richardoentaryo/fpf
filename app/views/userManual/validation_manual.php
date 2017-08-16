<div class="col-md-9">
    <p class="lead">
        <b>Validation User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>Validation Features</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    FPF has some helpful features that could help you improves the code eficiency significantly
                    by provide some useful validation methods so you don't have to rewrite or re-create new validation methods everytime by yourself.<br><br>

                    Basic implementation of data validation in FPF:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        // an example of doing a validation and retrieve it's error information <br>
                        // instantiate the validation object first <br><br>
                        $validation         = new Validation(); <br>
                        $validationErrors   = null; <br><br>

                        if(!$validation->validate([ <br>
                            &emsp;&emsp;"Username" => [$data1, "required|alphaNumWithSpaces|minLen(5)|maxLen(15)"], <br>
                            &emsp;&emsp;"Password" => [$data2, "required|minLen(6)|password"]])) <br>
                        { <br>
                            &emsp;&emsp;$validationErrors = $validation->errors(); <br>
                        }
                    </span>
                </div>
                <p>
                    Here some explanation from the code, $validation is a direct instance of Validation object, so it has the whole features of Validation.
                    Validation process is handled by validation() method which accept only array inputs.
                    You can user more than one rule by concatenating each rules with "|".
                </p><br>

                <p>
                    Here is the FPF validation rules:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        required <br>
                        minLen(filterParam) <br>
                        maxLen(filterParam) <br>
                        rangeNum(filterParam[]) <br>
                        integer <br>
                        inArray(filterParam[]) <br>
                        alphaNum <br>
                        alphaNumWithSpaces <br>
                        password <br>
                        email <br>
                        equals(filterParam) <br>
                        notEqual(filterParam)
                    </span>
                </div>
                <p>
                    Most of the validation rules has parameter input(s) as show above.
                    Only some rules like: required, integer, alpaNum, alphaNumWithSpaces, password, and email that don't require parameter inputs.
                </p>
                <ul class='pull-left'>
                    <li><strong>minLen and maxLen</strong> has same type of integer inputs that is going to be used string length limitation.</li>
                    <li><strong>rangeNum</strong> uses array type of input parameter which array has two integer numbers for indicating the bottom and upper limit of number range.</li>
                    <li><strong>inArray</strong> also uses array input parameter, but doesn't has to be a specific integer or string type of array.</li>
                    <li><strong>minLen and maxLen</strong> has same type of parameter inputs that is going to be used as comparison with the input.</li>
                </ul>

            </div>

        </div>

    </div>

</div>
