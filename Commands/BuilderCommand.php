<?php
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BuilderCommand extends Command
{
    protected $commandName = 'build';
    protected $commandDescription = "build something";
    protected $commandArgumentName = "name";
    protected $commandArgumentDescription = "what do you want to build?";
    protected $commandOptionName = "options"; // should be specified like "app:greet John --cap"
    protected $commandOptionDescription = 'If set, it will add options';

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::REQUIRED,
                $this->commandArgumentDescription
            )
            ->addOption(
               $this->commandOptionName,
               null,
               InputOption::VALUE_NONE,
               $this->commandOptionDescription
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument($this->commandArgumentName);

        if (strpos($name, 'controller') !== false) // check if the argument contains controller keyword
        {
            // create controller
            $controllerName = explode(':', $name);

            $controllerFile = fopen('./app/controllers/' . $controllerName[1] . ".php", "w");

            $stringData = "<?php \nclass " . ucfirst($controllerName[1]) . " extends Controller\n{\n\tpublic function __construct()\n\t{\n\t\tparent::__construct();\n\t\t//add your own contructor below...\n\t}\n\n\tpublic function index()\n\t{\n\t\t//something...\n\t}\n}";
            fwrite($controllerFile, $stringData);

            $text = 'Controller '. $controllerName[1] . " created";
        }
        else if (strpos($name, 'model') !== false) // check if the argument contains model keyword
        {
            // create model
            $modelName = explode(':', $name);

            $modelFile = fopen('./app/models/' . $modelName[1] . ".php", "w");

            $stringData = "<?php\n\nclass " . ucfirst($modelName[1]) . " extends Model\n{\n\tpublic function __construct()\n\t{\n\t\tparent::__construct();\n\t\t//add your own contructor below...\n\t}\n\n\tpublic function fetch()\n\t{\n\t\t//select code...\n\t}\n\n\tpublic function insert()\n\t{\n\t\t//insert code...\n\t}\n\n\tpublic function update()\n\t{\n\t\t//update code...\n\t}\n\n\tpublic function delete()\n\t{\n\t\t//delete code...\n\t}\n}";
            fwrite($modelFile, $stringData);

            $text = 'Model '. $modelName[1] . " created";
        }
        else if (strpos($name, 'migrate') !== false){

            $migrateStatement = explode(':', $name);

            $array['config'] = require './app/config/config.php';
            $array['migration'] = require './app/config/imigrant.php';

            $servername = $array['config']['DB_HOST'];
            $username   = $array['config']['DB_USER'];
            $password   = $array['config']['DB_PASS'];
            $dbname     = $array['config']['DB_NAME'];
            $dsn        = $array['config']['DB_DSN'];

            if ($migrateStatement[1] == 'createdb'){
                try {

                    $conn = new PDO($dsn . ":host=$servername", $username, $password);

                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "CREATE DATABASE " . $dbname;

                    // use exec() because no results are returned
                    $conn->exec($sql);
                    $text = 'database successfuly created';

                } catch (PDOException $e) {
                    $text = $e->getMessage();
                }

            }
            else if ($migrateStatement[1] == 'up'){

                try {
                    $conn = new PDO($dsn . ":host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // create table to database
                    foreach ($array['migration']['UP'] as $value) {
                        $sql = $value;
                        $conn->exec($sql);
                    }

                    $text = 'database tables migration successful';
                } catch (PDOException $e) {
                    $text = $e->getMessage();
                }
            }
            else if ($migrateStatement[1] == 'down'){

                try {
                    $conn = new PDO($dsn . ":host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // drop table from database
                    foreach ($array['migration']['DOWN'] as $value) {
                        $sql = $value;
                        $conn->exec($sql);
                    }

                    $text = 'table(s) dropped successful';
                } catch (PDOException $e) {
                    $text = $e->getMessage();
                }
            }

        }
        else
        {
            $text = 'Hello, unfortunately i cannot build ' . $name;
        }

        if ($input->getOption($this->commandOptionName)) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }
}
