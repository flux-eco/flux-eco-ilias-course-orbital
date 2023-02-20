<?php

namespace FluxEco\IliasCourseOrbital\Adapters\Api;

use FluxIliasBaseApi\Adapter\Course\CourseDto;
use FluxIliasBaseApi\Adapter\Object\DefaultObjectType;
use FluxIliasRestApiClient\Adapter\Api\IliasRestApiClient;

class FluxEcoIliasCourseOrbitalApi
{

    private function __construct(
        private IliasRestApiClient $iliasRestApiClient
    )
    {

    }

    public static function new($iliasRestApiClient): self
    {
        return new self(
            $iliasRestApiClient
        );
    }

    /**
     * Modify courses of a category tree using the specified modification callback.
     *
     * @param string $categoryImportId the import id of the category
     * @param callable $modifyCallback A callback function that takes a CourseDto object as its parameter and returns a CourseDiffDto object with the desired modifications.
     *
     * @return array An array with a single "success" element set to true if the modifications were applied successfully.
     */
    public function modifyCoursesOfTree(string $categoryImportId, callable $modifyCourseCallback)
    {
        $filteredCourses = $this->getCourseObjectDtosOfTreeByCategoryImportId($categoryImportId);

        $coursesToHandle = count($filteredCourses);
        $handledCourses = 0;

        echo "...found " . $coursesToHandle . " courses" . PHP_EOL;
        echo "...start modification process" . PHP_EOL;

        // Loop through the filtered courses and apply the modifications using the callback function
        foreach ($filteredCourses as $course) {
            $modifiedCourse = call_user_func($modifyCourseCallback, $course);
            echo "... update course to " . json_encode($modifiedCourse) . PHP_EOL;
            $this->iliasRestApiClient->updateCourseByRefId($course->ref_id, $modifiedCourse);

            $handledCourses++;
            $coursesToHandle--;
            echo "...courses handled: " . $handledCourses . PHP_EOL;
            echo "...courses to handle: " . $coursesToHandle . PHP_EOL;
        }

        // Return a success response
        return array('success' => true);
    }

    /**
     * @param string $categoryImportId
     * @return CourseDto[]
     */
    public function getCourseObjectDtosOfTreeByCategoryImportId(string $categoryImportId): array
    {
        $children = $this->iliasRestApiClient->getChildrenByImportId($categoryImportId);
        $courseObjectDtos = array();

        foreach ($children as $child) {
            if ($child->type === DefaultObjectType::CATEGORY) {
                // Recursively call the function to retrieve courses in the child category
                echo "...get children of " . $child->ref_id . " " . $child->title; echo PHP_EOL;
                $courseObjectDtos = array_merge($courseObjectDtos, $this->getCourseObjectDtosOfTreeByCategoryImportId($child->import_id));
            } else if ($child->type === DefaultObjectType::COURSE) {
                // Add the course to the result array
                echo "...get course dto of " . $child->ref_id . " " . $child->title; echo PHP_EOL;
                $courseObjectDtos[] = $this->iliasRestApiClient->getCourseByRefId($child->ref_id);
            }
        }

        return $courseObjectDtos;
    }


    /**
     * Modify courses that match the filter criteria using the specified modification callback.
     *
     * @param CourseDto $courseFilter The filter criteria used to select which courses to modify.
     * @param callable $modifyCourseCallback A callback function that takes a CourseDto object as its parameter and returns a CourseDiffDto object with the desired modifications.
     *
     * @return array An array with a single "success" element set to true if the modifications were applied successfully.
     */
    public function modifyCourses(CourseDto $courseFilter, callable $modifyCourseCallback)
    {
        // Retrieve the list of courses from the REST API
        $courses = $this->iliasRestApiClient->getCourses();

        // Filter the list of courses based on the filter object
        $filteredCourses = array_filter($courses, function ($course) use ($courseFilter) {
            // Check if all properties in the filter object match the corresponding properties in the course object
            foreach ($courseFilter as $key => $value) {
                if ($course->$key !== $value) {
                    return false;
                }
            }
            return true;
        });

        // Loop through the filtered courses and apply the modifications using the callback function
        foreach ($filteredCourses as $course) {
            $modifiedCourse = call_user_func($modifyCourseCallback, $course);
            $this->iliasRestApiClient->updateCourseByRefId($course->ref_id, $modifiedCourse);
        }

        // Return a success response
        return array('success' => true);
    }
}