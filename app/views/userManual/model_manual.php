<div class="col-md-9">
    <p class="lead">
        <b>Model User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>Model Instantiation</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Model instantiation code should be inside a controller, and the implementation code is:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $model = new ModelName();
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Basic PDO Usage</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    If you dont want to use query assist, then the only way to communicate with the database is by using PDO.<br>
                    Here is example code of how to use basic PDO in Facade Framework.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $pdo = Database::getInstanceOfPDO();<br><br>

                		$query = $pdo->prepare("select * from table where id = 1");<br>
                		$query->execute();<br><br>

                		$result = $query->fetchAll();<br><br>

                        or you can use to fetch using associative array format:<br><br>

                		$result = $query->fetchAll(PDO::FETCH_ASSOC);
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Query Assist</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    IMPORTANT! query assist only works inside a model.
                </p>
                <p> Select all from certain table</p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->fetchAll("table name", limit, offset);
                    </span>
                </div>
                <br><br>

                <p> Select specific columns from certain table</p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->select("id, name, address", "table name", limit, offset);
                    </span>
                </div>
                <br><br>

                <p> Select specific columns from certain table with where clause</p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->selectWhere("id, username, fullname", "user", array("username" => "'name'"), limit, offset);
                    </span>
                </div>
                <br><br>

                <p> Begin database transaction from PDO</p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->beginTransaction();
                    </span>
                </div>
                <br><br>

                <p> Prepare, bind, and executing query is useful for inserting,updating, or deleting data.<br>
                    Below is the example code</p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $query = <br>
                        "INSERT INTO user (id, fullname, username, password) ".<br>
                        "VALUES (:id, :fullname, :username, :password, :regdate)";<br><br>
                        $this->prepare($query);<br>
                        $this->bindValue(':id', null);<br>
                        $this->bindValue(':fullname', "New User");<br>
                        $this->bindValue(':username', "user");<br>
                        $this->bindValue(':password', "pass");<br>
                        $this->bindValue(':regdate', null);<br>
                        $this->execute();
                    </span>
                </div>
                <br><br>

                <p> Commit database</p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->commit();
                    </span>
                </div>
                <br><br>

                <p> Rollback database</p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->rollback();
                    </span>
                </div>

            </div>

        </div>

    </div>

</div>
