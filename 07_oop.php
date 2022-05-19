<?php
  // Access object information with ->
  class Student {
    const SCHOOL = 'HKFYG Lee Shau Kee College';

    // Called upon initialization of an object
    // Mostly for initializing object information without calling extra methods after creating the instance.
    function __construct(string $name, string $major) {
      $this->name = $name;
      $this->major = $major;
      echo "<p>CREATED: Student Name is $this->name and majors in $this->major</p>";
    }

    // Called upon destruction of object / end of script
    // Mostly used for cleaning up purpose, such as closing connections.
    function __destruct() {
      echo "<small>Destructor for $this->name is called.</small>";
    }

    // Custom Methods (public is default, thus the keyword is optional)
    function getInfo() {
      echo "<p>INQUIRY: Student Name is $this->name and majors in $this->major</p>";
    }

    function getSchool() {
      // using constant in classes
      echo "<p>INQUIRY: Student $this->name studies in " . self::SCHOOL . ".</p>";
    }

    function setName(string $newName) {
      $this->name = $newName;
    }

    public function setMajor(string $newMajor) {
      $this->major = $newMajor;
      echo "<p>EDIT: Student $this->name now majors in $this->major</p>";
    }

    // static methods, can be called without instance
    public static function sing() {
      echo "<p>SINGING: To HLC Our School!</p>";
    }
  }

  // INHERITANCE -- create a new class that extends from parent
  // extended classes can overwrite methods, including the constructor.
  class Graduate extends Student {
    function __construct(string $name, string $major, int $gradYr) {
      $this->name = $name;
      $this->major = $major;
      $this->gradYr = $gradYr;
    }

    public function celebrate() {
      echo "<p>CONGRATS: $this->name has successfully graduated at $this->gradYr!</p>";
    }

    // Overwriting method that already exist in parent
    public function getInfo() {
      echo "<p>INQUIRY: Graduate name is $this->name and majors in $this->major. Graduated at $this->gradYr.</p>";
    }
  }

  $john = new Student('John', 'Accountancy');
  $mary = new Student('Mary', 'Computer Science');
  $bob = new Graduate('Bob', 'Liberal Art', 2022);

  $john->setMajor('Computer Science');
  $john->getInfo();
  $john->getSchool();

  $bob->getInfo();
  $bob->celebrate();

  Student::sing();

  // Check if object (instance) come from given class (template)
  var_dump($john instanceof Student);
?>