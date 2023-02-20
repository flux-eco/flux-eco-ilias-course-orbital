# FluxEcoIliasCourseOrbitalApi
The **FluxEcoIliasCourseOrbitalApi** class provides a simple interface for modifying courses in ILIAS. 
It acts as a proxy between your application and the **flux-ilias-rest-api** by providing a set of convenient functions for 
modifying courses.

## Installation
The FluxEcoIliasCourseOrbitalApi class requires PHP 8.2 or later and the flux-ilias-rest-api-client.

To install the required dependencies, you can use the following command:

```
app/bin/install-libraries.sh
```

Once the dependencies are installed, you can use the FluxEcoIliasCourseOrbitalApi class in your PHP code.

## Usage
To use the **FluxEcoIliasCourseOrbitalApi** class, create a new instance of the class with an instance of the IliasRestApiClient class as its parameter:

``` php
use FluxEco\IliasCourseOrbital\Adapters\Api\FluxEcoIliasCourseOrbitalApi;
use FluxIliasRestApiClient\Adapter\Api\IliasRestApiClient;

$iliasRestApiClient = new IliasRestApiClient();
$api = FluxEcoIliasCourseOrbitalApi::new($iliasRestApiClient);
```

## Modifying courses
To modify courses in ILIAS, you can use the **modifyCourses()** function of the **FluxEcoIliasCourseOrbitalApi** class. 
This function allows you to modify courses that match a specific set of filter criteria by using a callback 
function to define the modifications. 

Here's an example of how to use this function:

``` php
// Define the filter criteria for the courses to modify
$filterObj = new stdClass();
$filterObj->title = "My Course";
$filterDto = CourseDto::newFromObject($filterObj);

// Define the modification to apply to the matching courses
$modifyCallback = function (CourseDto $course) {
    $crsDiffObj = new stdClass();
    $crsDiffObj->title = $course->title. " - mySuffix";
    return CourseDiffDto::newFromObject($crsDiffObj);
};

// Modify the courses that match the filter criteria
$result = $api->modifyCourses($filterDto, $modifyCallback);
```

## Modifying courses of a category tree
To modify all courses in a category tree, you can use the modifyCoursesOfTree() function of 
the FluxEcoIliasCourseOrbitalApi class. This function allows you to modify courses that belong 
to a specific category and all of its subcategories by using a callback function to define the modifications. 

Here's an example of how to use this function:
``` php
// Specify the import ID of the root category of the category tree to modify
$categoryImportId = "123456";

// Define the modification to apply to the matching courses
$modifyCallback = function (CourseDto $course) {
    $crsDiffObj = new stdClass();
    $crsDiffObj->title = $course->title. " - mySuffix";
    return CourseDiffDto::newFromObject($crsDiffObj);
};

// Modify the courses in the category tree
$result = $api->modifyCoursesOfTree($categoryImportId, $modifyCallback);
```

# Retrieving course objects of a category tree
To retrieve all course objects in a category tree, you can use the **getCourseObjectDtosOfTreeByCategoryImportId()** function 
of the **FluxEcoIliasCourseOrbitalApi** class. This function returns an array of **CourseDto** objects 
for all courses in the category tree rooted at the specified category import ID.

Here's an example of how to use this function:
``` php
// Specify the import ID of the root category of the category tree to retrieve course objects for
$categoryImportId = "123456";

// Retrieve the course objects in the category tree
$courseObjects = $api->getCourseObjectDtosOfTreeByCategoryImportId($categoryImportId);

// Print the title and description of each course object
foreach ($courseObjects as $courseObject) {
  echo "Title: " . $courseObject->title . PHP_EOL;
  echo "Description: " . $courseObject->description . PHP_EOL;
}
```

