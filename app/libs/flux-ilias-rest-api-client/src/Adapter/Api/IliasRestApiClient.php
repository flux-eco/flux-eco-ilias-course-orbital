<?php

namespace FluxIliasRestApiClient\Adapter\Api;

use Exception;
use FluxIliasBaseApi\Adapter\Category\CategoryDiffDto;
use FluxIliasBaseApi\Adapter\Category\CategoryDto;
use FluxIliasBaseApi\Adapter\Change\ChangeDto;
use FluxIliasBaseApi\Adapter\Course\CourseDiffDto;
use FluxIliasBaseApi\Adapter\Course\CourseDto;
use FluxIliasBaseApi\Adapter\CourseMember\CourseMemberDiffDto;
use FluxIliasBaseApi\Adapter\CourseMember\CourseMemberDto;
use FluxIliasBaseApi\Adapter\CourseMember\CourseMemberIdDto;
use FluxIliasBaseApi\Adapter\File\FileDiffDto;
use FluxIliasBaseApi\Adapter\File\FileDto;
use FluxIliasBaseApi\Adapter\FluxIliasRestObject\FluxIliasRestObjectDiffDto;
use FluxIliasBaseApi\Adapter\FluxIliasRestObject\FluxIliasRestObjectDto;
use FluxIliasBaseApi\Adapter\Group\GroupDiffDto;
use FluxIliasBaseApi\Adapter\Group\GroupDto;
use FluxIliasBaseApi\Adapter\GroupMember\GroupMemberDiffDto;
use FluxIliasBaseApi\Adapter\GroupMember\GroupMemberDto;
use FluxIliasBaseApi\Adapter\GroupMember\GroupMemberIdDto;
use FluxIliasBaseApi\Adapter\Object\ObjectDiffDto;
use FluxIliasBaseApi\Adapter\Object\ObjectDto;
use FluxIliasBaseApi\Adapter\Object\ObjectIdDto;
use FluxIliasBaseApi\Adapter\Object\ObjectType;
use FluxIliasBaseApi\Adapter\ObjectLearningProgress\ObjectLearningProgress;
use FluxIliasBaseApi\Adapter\ObjectLearningProgress\ObjectLearningProgressDto;
use FluxIliasBaseApi\Adapter\ObjectLearningProgress\ObjectLearningProgressIdDto;
use FluxIliasBaseApi\Adapter\OrganisationalUnit\OrganisationalUnitDiffDto;
use FluxIliasBaseApi\Adapter\OrganisationalUnit\OrganisationalUnitDto;
use FluxIliasBaseApi\Adapter\OrganisationalUnit\OrganisationalUnitIdDto;
use FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionCoreIdentifier;
use FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDiffDto;
use FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDto;
use FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionIdDto;
use FluxIliasBaseApi\Adapter\OrganisationalUnitStaff\OrganisationalUnitStaffDto;
use FluxIliasBaseApi\Adapter\Permission\Permission;
use FluxIliasBaseApi\Adapter\Role\RoleDiffDto;
use FluxIliasBaseApi\Adapter\Role\RoleDto;
use FluxIliasBaseApi\Adapter\ScormLearningModule\ScormLearningModuleDiffDto;
use FluxIliasBaseApi\Adapter\ScormLearningModule\ScormLearningModuleDto;
use FluxIliasBaseApi\Adapter\User\UserDiffDto;
use FluxIliasBaseApi\Adapter\User\UserDto;
use FluxIliasBaseApi\Adapter\User\UserIdDto;
use FluxIliasBaseApi\Adapter\UserFavourite\UserFavouriteDto;
use FluxIliasBaseApi\Adapter\UserRole\UserRoleDto;
use FluxRestApi\Adapter\Api\RestApi;
use FluxRestApi\Adapter\Authorization\ParseHttp\ParseHttpAuthorization_;
use FluxRestApi\Adapter\Authorization\ParseHttpBasic\ParseHttpBasicAuthorization_;
use FluxRestApi\Adapter\Authorization\Schema\DefaultAuthorizationSchema;
use FluxRestApi\Adapter\Body\BodyDto;
use FluxRestApi\Adapter\Body\FormDataBodyDto;
use FluxRestApi\Adapter\Body\HtmlBodyDto;
use FluxRestApi\Adapter\Body\JsonBodyDto;
use FluxRestApi\Adapter\Body\TextBodyDto;
use FluxRestApi\Adapter\Body\Type\DefaultBodyType;
use FluxRestApi\Adapter\Client\ClientRequestDto;
use FluxRestApi\Adapter\Header\DefaultHeaderKey;
use FluxRestApi\Adapter\Method\DefaultMethod;
use FluxRestApi\Adapter\Method\Method;
use FluxRestApi\Adapter\Status\DefaultStatus;

class IliasRestApiClient
{

    private function __construct(
        private readonly IliasRestApiClientConfigDto $ilias_rest_api_client_config
    ) {

    }


    public static function new(
        ?IliasRestApiClientConfigDto $ilias_rest_api_client_config = null
    ) : static {
        return new static(
            $ilias_rest_api_client_config ?? IliasRestApiClientConfigDto::newFromEnv()
        );
    }


    public function addCourseMemberByIdByUserId(int $id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-id/{id}/add-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::POST,
            [
                "id"      => $id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addCourseMemberByIdByUserImportId(int $id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-id/{id}/add-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::POST,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addCourseMemberByImportIdByUserId(string $import_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-import-id/{import_id}/add-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::POST,
            [
                "import_id" => $import_id,
                "user_id"   => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addCourseMemberByImportIdByUserImportId(string $import_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-import-id/{import_id}/add-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::POST,
            [
                "import_id"      => $import_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addCourseMemberByRefIdByUserId(int $ref_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}/add-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"  => $ref_id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addCourseMemberByRefIdByUserImportId(int $ref_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}/add-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addGroupMemberByIdByUserId(int $id, int $user_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-id/{id}/add-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::POST,
            [
                "id"      => $id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addGroupMemberByIdByUserImportId(int $id, string $user_import_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-id/{id}/add-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::POST,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addGroupMemberByImportIdByUserId(string $import_id, int $user_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-import-id/{import_id}/add-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::POST,
            [
                "import_id" => $import_id,
                "user_id"   => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addGroupMemberByImportIdByUserImportId(string $import_id, string $user_import_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-import-id/{import_id}/add-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::POST,
            [
                "import_id"      => $import_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addGroupMemberByRefIdByUserId(int $ref_id, int $user_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}/add-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"  => $ref_id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addGroupMemberByRefIdByUserImportId(int $ref_id, string $user_import_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}/add-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function addOrganisationalUnitStaffByExternalIdByUserId(string $external_id, int $user_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-external-id/{external_id}/add-staff/by-id/{user_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::POST,
            [
                "external_id" => $external_id,
                "user_id"     => $user_id,
                "position_id" => $position_id
            ]
        );
    }


    public function addOrganisationalUnitStaffByExternalIdByUserImportId(string $external_id, string $user_import_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-external-id/{external_id}/add-staff/by-import-id/{user_import_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::POST,
            [
                "external_id"    => $external_id,
                "user_import_id" => $user_import_id,
                "position_id"    => $position_id
            ]
        );
    }


    public function addOrganisationalUnitStaffByIdByUserId(int $id, int $user_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-id/{id}/add-staff/by-id/{user_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::POST,
            [
                "id"          => $id,
                "user_id"     => $user_id,
                "position_id" => $position_id
            ]
        );
    }


    public function addOrganisationalUnitStaffByIdByUserImportId(int $id, string $user_import_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-id/{id}/add-staff/by-import-id/{user_import_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::POST,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id,
                "position_id"    => $position_id
            ]
        );
    }


    public function addOrganisationalUnitStaffByRefIdByUserId(int $ref_id, int $user_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-ref-id/{ref_id}/add-staff/by-id/{user_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::POST,
            [
                "ref_id"      => $ref_id,
                "user_id"     => $user_id,
                "position_id" => $position_id
            ]
        );
    }


    public function addOrganisationalUnitStaffByRefIdByUserImportId(int $ref_id, string $user_import_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-ref-id/{ref_id}/add-staff/by-import-id/{user_import_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::POST,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id,
                "position_id"    => $position_id
            ]
        );
    }


    public function addUserFavouriteByIdByObjectId(int $id, int $object_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-id/{id}/add-favourite/by-id/{object_id}",
            UserFavouriteDto::class,
            DefaultMethod::POST,
            [
                "id"        => $id,
                "object_id" => $object_id
            ]
        );
    }


    public function addUserFavouriteByIdByObjectImportId(int $id, string $object_import_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-id/{id}/add-favourite/by-import-id/{object_import_id}",
            UserFavouriteDto::class,
            DefaultMethod::POST,
            [
                "id"               => $id,
                "object_import_id" => $object_import_id
            ]
        );
    }


    public function addUserFavouriteByIdByObjectRefId(int $id, int $object_ref_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-id/{id}/add-favourite/by-ref-id/{object_ref_id}",
            UserFavouriteDto::class,
            DefaultMethod::POST,
            [
                "id"            => $id,
                "object_ref_id" => $object_ref_id
            ]
        );
    }


    public function addUserFavouriteByImportIdByObjectId(string $import_id, int $object_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/add-favourite/by-id/{object_id}",
            UserFavouriteDto::class,
            DefaultMethod::POST,
            [
                "import_id" => $import_id,
                "object_id" => $object_id
            ]
        );
    }


    public function addUserFavouriteByImportIdByObjectImportId(string $import_id, string $object_import_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/add-favourite/by-import-id/{object_import_id}",
            UserFavouriteDto::class,
            DefaultMethod::POST,
            [
                "import_id"        => $import_id,
                "object_import_id" => $object_import_id
            ]
        );
    }


    public function addUserFavouriteByImportIdByObjectRefId(string $import_id, int $object_ref_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/add-favourite/by-ref-id/{object_ref_id}",
            UserFavouriteDto::class,
            DefaultMethod::POST,
            [
                "import_id"     => $import_id,
                "object_ref_id" => $object_ref_id
            ]
        );
    }


    public function addUserRoleByIdByRoleId(int $id, int $role_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-id/{id}/add-role/by-id/{role_id}",
            UserRoleDto::class,
            DefaultMethod::POST,
            [
                "id"      => $id,
                "role_id" => $role_id
            ]
        );
    }


    public function addUserRoleByIdByRoleImportId(int $id, string $role_import_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-id/{id}/add-role/by-import-id/{role_import_id}",
            UserRoleDto::class,
            DefaultMethod::POST,
            [
                "id"             => $id,
                "role_import_id" => $role_import_id
            ]
        );
    }


    public function addUserRoleByImportIdByRoleId(string $import_id, int $role_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/add-role/by-id/{role_id}",
            UserRoleDto::class,
            DefaultMethod::POST,
            [
                "import_id" => $import_id,
                "role_id"   => $role_id
            ]
        );
    }


    public function addUserRoleByImportIdByRoleImportId(string $import_id, string $role_import_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/add-role/by-import-id/{role_import_id}",
            UserRoleDto::class,
            DefaultMethod::POST,
            [
                "import_id"      => $import_id,
                "role_import_id" => $role_import_id
            ]
        );
    }


    public function cloneObjectByIdToId(int $id, int $parent_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/clone/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "id"        => $id,
                "parent_id" => $parent_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByIdToImportId(int $id, string $parent_import_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/clone/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "id"               => $id,
                "parent_import_id" => $parent_import_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByIdToRefId(int $id, int $parent_ref_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/clone/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "id"            => $id,
                "parent_ref_id" => $parent_ref_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByImportIdToId(string $import_id, int $parent_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/clone/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "import_id" => $import_id,
                "parent_id" => $parent_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByImportIdToImportId(string $import_id, string $parent_import_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/clone/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "import_id"        => $import_id,
                "parent_import_id" => $parent_import_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByImportIdToRefId(string $import_id, int $parent_ref_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/clone/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "import_id"     => $import_id,
                "parent_ref_id" => $parent_ref_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByRefIdToId(int $ref_id, int $parent_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/clone/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"    => $ref_id,
                "parent_id" => $parent_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByRefIdToImportId(int $ref_id, string $parent_import_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/clone/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"           => $ref_id,
                "parent_import_id" => $parent_import_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function cloneObjectByRefIdToRefId(int $ref_id, int $parent_ref_id, bool $link = false, bool $prefer_link = false) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/clone/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"        => $ref_id,
                "parent_ref_id" => $parent_ref_id
            ],
            [
                "link"        => $link,
                "prefer_link" => $prefer_link
            ]
        );
    }


    public function createCategoryToId(int $parent_id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "category/create/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createCategoryToImportId(string $parent_import_id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "category/create/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_import_id" => $parent_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createCategoryToRefId(int $parent_ref_id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "category/create/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createCourseToId(int $parent_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "course/create/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createCourseToImportId(string $parent_import_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "course/create/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_import_id" => $parent_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createCourseToRefId(int $parent_ref_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "course/create/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createFileToId(int $parent_id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "file/create/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createFileToImportId(string $parent_import_id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "file/create/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_import_id" => $parent_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createFileToRefId(int $parent_ref_id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "file/create/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createFluxIliasRestObjectToId(int $parent_id, FluxIliasRestObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "flux-ilias-rest-object/create/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createFluxIliasRestObjectToImportId(string $parent_import_id, FluxIliasRestObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "flux-ilias-rest-object/create/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_import_id" => $parent_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createFluxIliasRestObjectToRefId(int $parent_ref_id, FluxIliasRestObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "flux-ilias-rest-object/create/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createGroupToId(int $parent_id, GroupDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "group/create/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createGroupToImportId(string $parent_import_id, GroupDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "group/create/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_import_id" => $parent_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createGroupToRefId(int $parent_ref_id, GroupDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "group/create/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createObjectToId(ObjectType $type, int $parent_id, ObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "object/create/{type}/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "type"      => $type,
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createObjectToImportId(ObjectType $type, string $parent_import_id, ObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "object/create/{type}/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "type"             => $type,
                "parent_import_id" => $parent_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createObjectToRefId(ObjectType $type, int $parent_ref_id, ObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "object/create/{type}/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "type"          => $type,
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createOrganisationalUnitPosition(OrganisationalUnitPositionDiffDto $diff) : OrganisationalUnitPositionIdDto
    {
        return $this->request(
            "organisational-unit-position/create",
            OrganisationalUnitPositionIdDto::class,
            DefaultMethod::POST,
            null,
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createOrganisationalUnitToExternalId(string $parent_external_id, OrganisationalUnitDiffDto $diff) : ?OrganisationalUnitIdDto
    {
        return $this->request(
            "organisational-unit/create/to-external-id/{parent_external_id}",
            OrganisationalUnitIdDto::class,
            DefaultMethod::POST,
            [
                "parent_external_id" => $parent_external_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createOrganisationalUnitToId(int $parent_id, OrganisationalUnitDiffDto $diff) : ?OrganisationalUnitIdDto
    {
        return $this->request(
            "organisational-unit/create/to-id/{parent_id}",
            OrganisationalUnitIdDto::class,
            DefaultMethod::POST,
            [
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createOrganisationalUnitToRefId(int $parent_ref_id, OrganisationalUnitDiffDto $diff) : ?OrganisationalUnitIdDto
    {
        return $this->request(
            "organisational-unit/create/to-ref-id/{parent_ref_id}",
            OrganisationalUnitIdDto::class,
            DefaultMethod::POST,
            [
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createRoleToId(int $object_id, RoleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "role/create/to-id/{object_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "object_id" => $object_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createRoleToImportId(string $object_import_id, RoleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "role/create/to-import-id/{object_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "object_import_id" => $object_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createRoleToRefId(int $object_ref_id, RoleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "role/create/to-ref-id/{object_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "object_ref_id" => $object_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createScormLearningModuleToId(int $parent_id, ScormLearningModuleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/create/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_id" => $parent_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createScormLearningModuleToImportId(string $parent_import_id, ScormLearningModuleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/create/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_import_id" => $parent_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createScormLearningModuleToRefId(int $parent_ref_id, ScormLearningModuleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/create/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "parent_ref_id" => $parent_ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function createUser(UserDiffDto $diff) : UserIdDto
    {
        return $this->request(
            "user/create",
            UserIdDto::class,
            DefaultMethod::POST,
            null,
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function deleteObjectById(int $id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/delete",
            ObjectIdDto::class,
            DefaultMethod::DELETE,
            [
                "id" => $id
            ]
        );
    }


    public function deleteObjectByImportId(string $import_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/delete",
            ObjectIdDto::class,
            DefaultMethod::DELETE,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function deleteObjectByRefId(int $ref_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/delete",
            ObjectIdDto::class,
            DefaultMethod::DELETE,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    public function deleteOrganisationalUnitPositionById(int $id) : ?OrganisationalUnitPositionIdDto
    {
        return $this->request(
            "organisational-unit-position/by-id/{id}/delete",
            OrganisationalUnitPositionIdDto::class,
            DefaultMethod::DELETE,
            [
                "id" => $id
            ]
        );
    }


    /**
     * @return CategoryDto[]
     */
    public function getCategories() : array
    {
        return $this->request(
            "categories",
            CategoryDto::class
        );
    }


    public function getCategoryById(int $id) : ?CategoryDto
    {
        return $this->request(
            "category/by-id/{id}",
            CategoryDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getCategoryByImportId(string $import_id) : ?CategoryDto
    {
        return $this->request(
            "category/by-import-id/{import_id}",
            CategoryDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getCategoryByRefId(int $ref_id) : ?CategoryDto
    {
        return $this->request(
            "category/by-ref-id/{ref_id}",
            CategoryDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    /**
     * @return ChangeDto[]
     */
    public function getChanges(?float $from = null, ?float $to = null, ?float $after = null, ?float $before = null) : array
    {
        return $this->request(
            "changes",
            ChangeDto::class,
            null,
            null,
            [
                "from"   => $from,
                "to"     => $to,
                "after"  => $after,
                "before" => $before
            ]
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getChildrenById(int $id, ?ObjectType $type = null, ?string $title = null, bool $ref_ids = false) : ?array
    {
        return $this->request(
            "object/children/by-id/{id}",
            ObjectDto::class,
            null,
            [
                "id" => $id
            ],
            [
                "type"    => $type,
                "title"   => $title,
                "ref_ids" => $ref_ids
            ]
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getChildrenByImportId(string $import_id, ?ObjectType $type = null, ?string $title = null, bool $ref_ids = false) : ?array
    {
        return $this->request(
            "object/children/by-import-id/{import_id}",
            ObjectDto::class,
            null,
            [
                "import_id" => $import_id
            ],
            [
                "type"    => $type,
                "title"   => $title,
                "ref_ids" => $ref_ids
            ]
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getChildrenByRefId(int $ref_id, ?ObjectType $type = null, ?string $title = null, bool $ref_ids = false) : ?array
    {
        return $this->request(
            "object/children/by-ref-id/{ref_id}",
            ObjectDto::class,
            null,
            [
                "ref_id" => $ref_id
            ],
            [
                "type"    => $type,
                "title"   => $title,
                "ref_ids" => $ref_ids
            ]
        );
    }


    public function getCourseById(int $id) : ?CourseDto
    {
        return $this->request(
            "course/by-id/{id}",
            CourseDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getCourseByImportId(string $import_id) : ?CourseDto
    {
        return $this->request(
            "course/by-import-id/{import_id}",
            CourseDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getCourseByRefId(int $ref_id) : ?CourseDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}",
            CourseDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    /**
     * @return CourseMemberDto[]
     */
    public function getCourseMembers(
        ?int $course_id = null,
        ?string $course_import_id = null,
        ?int $course_ref_id = null,
        ?int $user_id = null,
        ?string $user_import_id = null,
        ?bool $member_role = null,
        ?bool $tutor_role = null,
        ?bool $administrator_role = null,
        ?ObjectLearningProgress $learning_progress = null,
        ?bool $passed = null,
        ?bool $access_refused = null,
        ?bool $tutorial_support = null,
        ?bool $notification = null
    ) : array {
        return $this->request(
            "course-members",
            CourseMemberDto::class,
            null,
            null,
            [
                "course_id"          => $course_id,
                "course_import_id"   => $course_import_id,
                "course_ref_id"      => $course_ref_id,
                "user_id"            => $user_id,
                "user_import_id"     => $user_import_id,
                "member_role"        => $member_role,
                "tutor_role"         => $tutor_role,
                "administrator_role" => $administrator_role,
                "learning_progress"  => $learning_progress,
                "passed"             => $passed,
                "access_refused"     => $access_refused,
                "tutorial_support"   => $tutorial_support,
                "notification"       => $notification
            ]
        );
    }


    /**
     * @return CourseDto[]
     */
    public function getCourses(bool $container_settings = false) : array
    {
        return $this->request(
            "courses",
            CourseDto::class,
            null,
            null,
            [
                "container_settings" => $container_settings
            ]
        );
    }


    public function getCurrentApiUser() : ?UserDto
    {
        return $this->request(
            "user/current/api",
            UserDto::class
        );
    }


    public function getCurrentWebUser() : ?UserDto
    {
        return $this->request(
            "user/current/web",
            UserDto::class
        );
    }


    public function getFileById(int $id) : ?FileDto
    {
        return $this->request(
            "file/by-id/{id}",
            FileDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getFileByImportId(string $import_id) : ?FileDto
    {
        return $this->request(
            "file/by-import-id/{import_id}",
            FileDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getFileByRefId(int $ref_id) : ?FileDto
    {
        return $this->request(
            "file/by-ref-id/{ref_id}",
            FileDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    /**
     * @return FileDto[]
     */
    public function getFiles() : array
    {
        return $this->request(
            "files",
            FileDto::class
        );
    }


    public function getFluxIliasRestObjectById(int $id) : ?FluxIliasRestObjectDto
    {
        return $this->request(
            "flux-ilias-rest-object/by-id/{id}",
            FluxIliasRestObjectDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getFluxIliasRestObjectByImportId(string $import_id) : ?FluxIliasRestObjectDto
    {
        return $this->request(
            "flux-ilias-rest-object/by-import-id/{import_id}",
            FluxIliasRestObjectDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getFluxIliasRestObjectByRefId(int $ref_id) : ?FluxIliasRestObjectDto
    {
        return $this->request(
            "flux-ilias-rest-object/by-ref-id/{ref_id}",
            FluxIliasRestObjectDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    /**
     * @return FluxIliasRestObjectDto[]
     */
    public function getFluxIliasRestObjects(bool $container_settings = false) : array
    {
        return $this->request(
            "flux-ilias-rest-objects",
            FluxIliasRestObjectDto::class,
            null,
            null,
            [
                "container_settings" => $container_settings
            ]
        );
    }


    public function getGlobalRoleObject() : ?ObjectDto
    {
        return $this->request(
            "role/global-object",
            ObjectDto::class
        );
    }


    public function getGroupById(int $id) : ?GroupDto
    {
        return $this->request(
            "group/by-id/{id}",
            GroupDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getGroupByImportId(string $import_id) : ?GroupDto
    {
        return $this->request(
            "group/by-import-id/{import_id}",
            GroupDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getGroupByRefId(int $ref_id) : ?GroupDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}",
            GroupDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    /**
     * @return GroupMemberDto[]
     */
    public function getGroupMembers(
        ?int $group_id = null,
        ?string $group_import_id = null,
        ?int $group_ref_id = null,
        ?int $user_id = null,
        ?string $user_import_id = null,
        ?bool $member_role = null,
        ?bool $administrator_role = null,
        ?ObjectLearningProgress $learning_progress = null,
        ?bool $tutorial_support = null,
        ?bool $notification = null
    ) : array {
        return $this->request(
            "group-members",
            GroupMemberDto::class,
            null,
            null,
            [
                "group_id"           => $group_id,
                "group_import_id"    => $group_import_id,
                "group_ref_id"       => $group_ref_id,
                "user_id"            => $user_id,
                "user_import_id"     => $user_import_id,
                "member_role"        => $member_role,
                "administrator_role" => $administrator_role,
                "learning_progress"  => $learning_progress,
                "tutorial_support"   => $tutorial_support,
                "notification"       => $notification
            ]
        );
    }


    /**
     * @return GroupDto[]
     */
    public function getGroups() : array
    {
        return $this->request(
            "groups",
            GroupDto::class
        );
    }


    public function getObjectById(int $id) : ?ObjectDto
    {
        return $this->request(
            "object/by-id/{id}",
            ObjectDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getObjectByImportId(string $import_id) : ?ObjectDto
    {
        return $this->request(
            "object/by-import-id/{import_id}",
            ObjectDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getObjectByRefId(int $ref_id) : ?ObjectDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}",
            ObjectDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    /**
     * @return ObjectLearningProgressDto[]
     */
    public function getObjectLearningProgress(
        ?int $object_id = null,
        ?string $object_import_id = null,
        ?int $object_ref_id = null,
        ?int $user_id = null,
        ?string $user_import_id = null,
        ?ObjectLearningProgress $learning_progress = null
    ) : array {
        return $this->request(
            "object/learning-progress",
            ObjectLearningProgressDto::class,
            null,
            null,
            [
                "object_id"         => $object_id,
                "object_import_id"  => $object_import_id,
                "object_ref_id"     => $object_ref_id,
                "user_id"           => $user_id,
                "user_import_id"    => $user_import_id,
                "learning_progress" => $learning_progress
            ]
        );
    }


    /**
     * @return ObjectDto[]
     */
    public function getObjects(ObjectType $type, ?string $title = null, bool $ref_ids = false) : array
    {
        return $this->request(
            "objects/{type}",
            ObjectDto::class,
            null,
            [
                "type" => $type
            ],
            [
                "title"   => $title,
                "ref_ids" => $ref_ids
            ]
        );
    }


    public function getOrganisationalUnitByExternalId(string $external_id) : ?OrganisationalUnitDto
    {
        return $this->request(
            "organisational-unit/by-external-id/{external_id}",
            OrganisationalUnitDto::class,
            null,
            [
                "external_id" => $external_id
            ]
        );
    }


    public function getOrganisationalUnitById(int $id) : ?OrganisationalUnitDto
    {
        return $this->request(
            "organisational-unit/by-id/{id}",
            OrganisationalUnitDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getOrganisationalUnitByRefId(int $ref_id) : ?OrganisationalUnitDto
    {
        return $this->request(
            "organisational-unit/by-ref-id/{ref_id}",
            OrganisationalUnitDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    public function getOrganisationalUnitPositionByCoreIdentifier(OrganisationalUnitPositionCoreIdentifier $core_identifier) : ?OrganisationalUnitPositionDto
    {
        return $this->request(
            "organisational-unit-position/by-core-identifier/{core_identifier}",
            OrganisationalUnitPositionDto::class,
            null,
            [
                "core_identifier" => $core_identifier
            ]
        );
    }


    public function getOrganisationalUnitPositionById(int $id) : ?OrganisationalUnitPositionDto
    {
        return $this->request(
            "organisational-unit-position/by-id/{id}",
            OrganisationalUnitPositionDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    /**
     * @return OrganisationalUnitPositionDto[]
     */
    public function getOrganisationalUnitPositions(bool $authorities = false) : array
    {
        return $this->request(
            "organisational-unit-positions",
            OrganisationalUnitPositionDto::class,
            null,
            null,
            [
                "authorities" => $authorities
            ]
        );
    }


    public function getOrganisationalUnitRoot() : ?OrganisationalUnitDto
    {
        return $this->request(
            "organisational-unit/root",
            OrganisationalUnitDto::class
        );
    }


    /**
     * @return OrganisationalUnitStaffDto[]
     */
    public function getOrganisationalUnitStaff(
        ?int $organisational_unit_id = null,
        ?string $organisational_unit_external_id = null,
        ?int $organisational_unit_ref_id = null,
        ?int $user_id = null,
        ?string $user_import_id = null,
        ?int $position_id = null
    ) : array {
        return $this->request(
            "organisational-unit-staff",
            OrganisationalUnitStaffDto::class,
            null,
            null,
            [
                "organisational_unit_id"          => $organisational_unit_id,
                "organisational_unit_external_id" => $organisational_unit_external_id,
                "organisational_unit_ref_id"      => $organisational_unit_ref_id,
                "user_id"                         => $user_id,
                "user_import_id"                  => $user_import_id,
                "position_id"                     => $position_id
            ]
        );
    }


    /**
     * @return OrganisationalUnitDto[]
     */
    public function getOrganisationalUnits() : array
    {
        return $this->request(
            "organisational-units",
            OrganisationalUnitDto::class
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getPathById(int $id, bool $ref_ids = false) : ?array
    {
        return $this->request(
            "object/path/by-id/{id}",
            ObjectDto::class,
            null,
            [
                "id" => $id
            ],
            [
                "ref_ids" => $ref_ids
            ]
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getPathByImportId(string $import_id, bool $ref_ids = false) : ?array
    {
        return $this->request(
            "object/path/by-import-id/{import_id}",
            ObjectDto::class,
            null,
            [
                "import_id" => $import_id
            ],
            [
                "ref_ids" => $ref_ids
            ]
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getPathByRefId(int $ref_id, bool $ref_ids = false) : ?array
    {
        return $this->request(
            "object/path/by-ref-id/{ref_id}",
            ObjectDto::class,
            null,
            [
                "ref_id" => $ref_id
            ],
            [
                "ref_ids" => $ref_ids
            ]
        );
    }


    public function getRoleById(int $id) : ?RoleDto
    {
        return $this->request(
            "role/by-id/{id}",
            RoleDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getRoleByImportId(string $import_id) : ?RoleDto
    {
        return $this->request(
            "role/by-import-id/{import_id}",
            RoleDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    /**
     * @return RoleDto[]
     */
    public function getRoles() : array
    {
        return $this->request(
            "roles",
            RoleDto::class
        );
    }


    public function getRootObject() : ?ObjectDto
    {
        return $this->request(
            "object/root",
            ObjectDto::class
        );
    }


    public function getScormLearningModuleById(int $id) : ?ScormLearningModuleDto
    {
        return $this->request(
            "scorm-learning-module/by-id/{id}",
            ScormLearningModuleDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getScormLearningModuleByImportId(string $import_id) : ?ScormLearningModuleDto
    {
        return $this->request(
            "scorm-learning-module/by-import-id/{import_id}",
            ScormLearningModuleDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getScormLearningModuleByRefId(int $ref_id) : ?ScormLearningModuleDto
    {
        return $this->request(
            "scorm-learning-module/by-ref-id/{ref_id}",
            ScormLearningModuleDto::class,
            null,
            [
                "ref_id" => $ref_id
            ]
        );
    }


    /**
     * @return ScormLearningModuleDto[]
     */
    public function getScormLearningModules() : array
    {
        return $this->request(
            "scorm-learning-modules",
            ScormLearningModuleDto::class
        );
    }


    public function getUnreadMailsCountById(int $id) : ?int
    {
        return $this->request(
            "user/by-id/{id}/unread-mails-count",
            null,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getUnreadMailsCountByImportId(string $import_id) : ?int
    {
        return $this->request(
            "user/by-import-id/{import_id}/unread-mails-count",
            null,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    public function getUserById(int $id) : ?UserDto
    {
        return $this->request(
            "user/by-id/{id}",
            UserDto::class,
            null,
            [
                "id" => $id
            ]
        );
    }


    public function getUserByImportId(string $import_id) : ?UserDto
    {
        return $this->request(
            "user/by-import-id/{import_id}",
            UserDto::class,
            null,
            [
                "import_id" => $import_id
            ]
        );
    }


    /**
     * @return UserFavouriteDto[]
     */
    public function getUserFavourites(?int $user_id = null, ?string $user_import_id = null, ?int $object_id = null, ?string $object_import_id = null, ?int $object_ref_id = null) : array
    {
        return $this->request(
            "user-favourites",
            UserFavouriteDto::class,
            null,
            null,
            [
                "user_id"          => $user_id,
                "user_import_id"   => $user_import_id,
                "object_id"        => $object_id,
                "object_import_id" => $object_import_id,
                "object_ref_id"    => $object_ref_id
            ]
        );
    }


    /**
     * @return UserRoleDto[]
     */
    public function getUserRoles(?int $user_id = null, ?string $user_import_id = null, ?int $role_id = null, ?string $role_import_id = null) : array
    {
        return $this->request(
            "user-roles",
            UserRoleDto::class,
            null,
            null,
            [
                "user_id"        => $user_id,
                "user_import_id" => $user_import_id,
                "role_id"        => $role_id,
                "role_import_id" => $role_import_id
            ]
        );
    }


    /**
     * @return UserDto[]
     */
    public function getUsers(
        ?string $external_account = null,
        ?string $login = null,
        ?string $email = null,
        ?string $matriculation_number = null,
        bool $access_limited_object_ids = false,
        bool $multi_fields = false,
        bool $preferences = false,
        bool $user_defined_fields = false
    ) : array {
        return $this->request(
            "users",
            UserDto::class,
            null,
            null,
            [
                "external_account"          => $external_account,
                "login"                     => $login,
                "email"                     => $email,
                "matriculation_number"      => $matriculation_number,
                "access_limited_object_ids" => $access_limited_object_ids,
                "multi_fields"              => $multi_fields,
                "preferences"               => $preferences,
                "user_defined_fields"       => $user_defined_fields
            ]
        );
    }


    public function hasAccessByRefIdByUserId(int $ref_id, int $user_id, Permission $permission) : bool
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/has-access/by-id/{user_id}/{permission}",
            null,
            null,
            [
                "ref_id"     => $ref_id,
                "user_id"    => $user_id,
                "permission" => $permission
            ]
        );
    }


    public function linkObjectByIdToId(int $id, int $parent_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/link/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "id"        => $id,
                "parent_id" => $parent_id
            ]
        );
    }


    public function linkObjectByIdToImportId(int $id, string $parent_import_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/link/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "id"               => $id,
                "parent_import_id" => $parent_import_id
            ]
        );
    }


    public function linkObjectByIdToRefId(int $id, int $parent_ref_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/link/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "id"            => $id,
                "parent_ref_id" => $parent_ref_id
            ]
        );
    }


    public function linkObjectByImportIdToId(string $import_id, int $parent_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/link/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "import_id" => $import_id,
                "parent_id" => $parent_id
            ]
        );
    }


    public function linkObjectByImportIdToImportId(string $import_id, string $parent_import_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/link/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "import_id"        => $import_id,
                "parent_import_id" => $parent_import_id
            ]
        );
    }


    public function linkObjectByImportIdToRefId(string $import_id, int $parent_ref_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/link/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "import_id"     => $import_id,
                "parent_ref_id" => $parent_ref_id
            ]
        );
    }


    public function linkObjectByRefIdToId(int $ref_id, int $parent_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/link/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"    => $ref_id,
                "parent_id" => $parent_id
            ]
        );
    }


    public function linkObjectByRefIdToImportId(int $ref_id, string $parent_import_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/link/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"           => $ref_id,
                "parent_import_id" => $parent_import_id
            ]
        );
    }


    public function linkObjectByRefIdToRefId(int $ref_id, int $parent_ref_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/link/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::POST,
            [
                "ref_id"        => $ref_id,
                "parent_ref_id" => $parent_ref_id
            ]
        );
    }


    public function moveObjectByIdToId(int $id, int $parent_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/move/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "id"        => $id,
                "parent_id" => $parent_id
            ]
        );
    }


    public function moveObjectByIdToImportId(int $id, string $parent_import_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/move/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "id"               => $id,
                "parent_import_id" => $parent_import_id
            ]
        );
    }


    public function moveObjectByIdToRefId(int $id, int $parent_ref_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/move/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "id"            => $id,
                "parent_ref_id" => $parent_ref_id
            ]
        );
    }


    public function moveObjectByImportIdToId(string $import_id, int $parent_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/move/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "import_id" => $import_id,
                "parent_id" => $parent_id
            ]
        );
    }


    public function moveObjectByImportIdToImportId(string $import_id, string $parent_import_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/move/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "import_id"        => $import_id,
                "parent_import_id" => $parent_import_id
            ]
        );
    }


    public function moveObjectByImportIdToRefId(string $import_id, int $parent_ref_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/move/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "import_id"     => $import_id,
                "parent_ref_id" => $parent_ref_id
            ]
        );
    }


    public function moveObjectByRefIdToId(int $ref_id, int $parent_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/move/to-id/{parent_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "ref_id"    => $ref_id,
                "parent_id" => $parent_id
            ]
        );
    }


    public function moveObjectByRefIdToImportId(int $ref_id, string $parent_import_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/move/to-import-id/{parent_import_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "ref_id"           => $ref_id,
                "parent_import_id" => $parent_import_id
            ]
        );
    }


    public function moveObjectByRefIdToRefId(int $ref_id, int $parent_ref_id) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/move/to-ref-id/{parent_ref_id}",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "ref_id"        => $ref_id,
                "parent_ref_id" => $parent_ref_id
            ]
        );
    }


    public function removeCourseMemberByIdByUserId(int $id, int $user_id) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-id/{id}/remove-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "id"      => $id,
                "user_id" => $user_id
            ]
        );
    }


    public function removeCourseMemberByIdByUserImportId(int $id, string $user_import_id) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-id/{id}/remove-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id
            ]
        );
    }


    public function removeCourseMemberByImportIdByUserId(string $import_id, int $user_id) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-import-id/{import_id}/remove-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "import_id" => $import_id,
                "user_id"   => $user_id
            ]
        );
    }


    public function removeCourseMemberByImportIdByUserImportId(string $import_id, string $user_import_id) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-import-id/{import_id}/remove-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "import_id"      => $import_id,
                "user_import_id" => $user_import_id
            ]
        );
    }


    public function removeCourseMemberByRefIdByUserId(int $ref_id, int $user_id) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}/remove-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "ref_id"  => $ref_id,
                "user_id" => $user_id
            ]
        );
    }


    public function removeCourseMemberByRefIdByUserImportId(int $ref_id, string $user_import_id) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}/remove-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id
            ]
        );
    }


    public function removeGroupMemberByIdByUserId(int $id, int $user_id) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-id/{id}/remove-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "id"      => $id,
                "user_id" => $user_id
            ]
        );
    }


    public function removeGroupMemberByIdByUserImportId(int $id, string $user_import_id) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-id/{id}/remove-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id
            ]
        );
    }


    public function removeGroupMemberByImportIdByUserId(string $import_id, int $user_id) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-import-id/{import_id}/remove-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "import_id" => $import_id,
                "user_id"   => $user_id
            ]
        );
    }


    public function removeGroupMemberByImportIdByUserImportId(string $import_id, string $user_import_id) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-import-id/{import_id}/remove-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "import_id"      => $import_id,
                "user_import_id" => $user_import_id
            ]
        );
    }


    public function removeGroupMemberByRefIdByUserId(int $ref_id, int $user_id) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}/remove-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "ref_id"  => $ref_id,
                "user_id" => $user_id
            ]
        );
    }


    public function removeGroupMemberByRefIdByUserImportId(int $ref_id, string $user_import_id) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}/remove-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::DELETE,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id
            ]
        );
    }


    public function removeOrganisationalUnitStaffByExternalIdByUserId(string $external_id, int $user_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-external-id/{external_id}/remove-staff/by-id/{user_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::DELETE,
            [
                "external_id" => $external_id,
                "user_id"     => $user_id,
                "position_id" => $position_id
            ]
        );
    }


    public function removeOrganisationalUnitStaffByExternalIdByUserImportId(string $external_id, string $user_import_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-external-id/{external_id}/remove-staff/by-import-id/{user_import_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::DELETE,
            [
                "external_id"    => $external_id,
                "user_import_id" => $user_import_id,
                "position_id"    => $position_id
            ]
        );
    }


    public function removeOrganisationalUnitStaffByIdByUserId(int $id, int $user_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-id/{id}/remove-staff/by-id/{user_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::DELETE,
            [
                "id"          => $id,
                "user_id"     => $user_id,
                "position_id" => $position_id
            ]
        );
    }


    public function removeOrganisationalUnitStaffByIdByUserImportId(int $id, string $user_import_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-id/{id}/remove-staff/by-import-id/{user_import_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::DELETE,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id,
                "position_id"    => $position_id
            ]
        );
    }


    public function removeOrganisationalUnitStaffByRefIdByUserId(int $ref_id, int $user_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-ref-id/{ref_id}/remove-staff/by-id/{user_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::DELETE,
            [
                "ref_id"      => $ref_id,
                "user_id"     => $user_id,
                "position_id" => $position_id
            ]
        );
    }


    public function removeOrganisationalUnitStaffByRefIdByUserImportId(int $ref_id, string $user_import_id, int $position_id) : ?OrganisationalUnitStaffDto
    {
        return $this->request(
            "organisational-unit/by-ref-id/{ref_id}/remove-staff/by-import-id/{user_import_id}/{position_id}",
            OrganisationalUnitStaffDto::class,
            DefaultMethod::DELETE,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id,
                "position_id"    => $position_id
            ]
        );
    }


    public function removeUserFavouriteByIdByObjectId(int $id, int $object_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-id/{id}/remove-favourite/by-id/{object_id}",
            UserFavouriteDto::class,
            DefaultMethod::DELETE,
            [
                "id"        => $id,
                "object_id" => $object_id
            ]
        );
    }


    public function removeUserFavouriteByIdByObjectImportId(int $id, string $object_import_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-id/{id}/remove-favourite/by-import-id/{object_import_id}",
            UserFavouriteDto::class,
            DefaultMethod::DELETE,
            [
                "id"               => $id,
                "object_import_id" => $object_import_id
            ]
        );
    }


    public function removeUserFavouriteByIdByObjectRefId(int $id, int $object_ref_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-id/{id}/remove-favourite/by-ref-id/{object_ref_id}",
            UserFavouriteDto::class,
            DefaultMethod::DELETE,
            [
                "id"            => $id,
                "object_ref_id" => $object_ref_id
            ]
        );
    }


    public function removeUserFavouriteByImportIdByObjectId(string $import_id, int $object_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/remove-favourite/by-id/{object_id}",
            UserFavouriteDto::class,
            DefaultMethod::DELETE,
            [
                "import_id" => $import_id,
                "object_id" => $object_id
            ]
        );
    }


    public function removeUserFavouriteByImportIdByObjectImportId(string $import_id, string $object_import_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/remove-favourite/by-import-id/{object_import_id}",
            UserFavouriteDto::class,
            DefaultMethod::DELETE,
            [
                "import_id"        => $import_id,
                "object_import_id" => $object_import_id
            ]
        );
    }


    public function removeUserFavouriteByImportIdByObjectRefId(string $import_id, int $object_ref_id) : ?UserFavouriteDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/remove-favourite/by-ref-id/{object_ref_id}",
            UserFavouriteDto::class,
            DefaultMethod::DELETE,
            [
                "import_id"     => $import_id,
                "object_ref_id" => $object_ref_id
            ]
        );
    }


    public function removeUserRoleByIdByRoleId(int $id, int $role_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-id/{id}/remove-role/by-id/{role_id}",
            UserRoleDto::class,
            DefaultMethod::DELETE,
            [
                "id"      => $id,
                "role_id" => $role_id
            ]
        );
    }


    public function removeUserRoleByIdByRoleImportId(int $id, string $role_import_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-id/{id}/remove-role/by-import-id/{role_import_id}",
            UserRoleDto::class,
            DefaultMethod::DELETE,
            [
                "id"             => $id,
                "role_import_id" => $role_import_id
            ]
        );
    }


    public function removeUserRoleByImportIdByRoleId(string $import_id, int $role_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/remove-role/by-id/{role_id}",
            UserRoleDto::class,
            DefaultMethod::DELETE,
            [
                "import_id" => $import_id,
                "role_id"   => $role_id
            ]
        );
    }


    public function removeUserRoleByImportIdByRoleImportId(string $import_id, string $role_import_id) : ?UserRoleDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/remove-role/by-import-id/{role_import_id}",
            UserRoleDto::class,
            DefaultMethod::DELETE,
            [
                "import_id"      => $import_id,
                "role_import_id" => $role_import_id
            ]
        );
    }


    public function updateAvatarById(int $id, ?string $file) : ?UserIdDto
    {
        return $this->request(
            "user/by-id/{id}/update/avatar",
            UserIdDto::class,
            DefaultMethod::PUT,
            [
                "id" => $id
            ],
            null,
            FormDataBodyDto::new(
                null,
                [
                    "file" => $file
                ]
            )
        );
    }


    public function updateAvatarByImportId(string $import_id, ?string $file) : ?UserIdDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/update/avatar",
            UserIdDto::class,
            DefaultMethod::PUT,
            [
                "import_id" => $import_id
            ],
            null,
            FormDataBodyDto::new(
                null,
                [
                    "file" => $file
                ]
            )
        );
    }


    public function updateCategoryById(int $id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "category/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCategoryByImportId(string $import_id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "category/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCategoryByRefId(int $ref_id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "category/by-ref-id/{ref_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseById(int $id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "course/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseByImportId(string $import_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "course/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseByRefId(int $ref_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseMemberByIdByUserId(int $id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-id/{id}/update-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "id"      => $id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseMemberByIdByUserImportId(int $id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-id/{id}/update-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseMemberByImportIdByUserId(string $import_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-import-id/{import_id}/update-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id,
                "user_id"   => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseMemberByImportIdByUserImportId(string $import_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-import-id/{import_id}/update-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id"      => $import_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseMemberByRefIdByUserId(int $ref_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}/update-member/by-id/{user_id}",
            CourseMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id"  => $ref_id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateCourseMemberByRefIdByUserImportId(int $ref_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return $this->request(
            "course/by-ref-id/{ref_id}/update-member/by-import-id/{user_import_id}",
            CourseMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateFileById(int $id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "file/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateFileByImportId(string $import_id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "file/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateFileByRefId(int $ref_id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "file/by-ref-id/{ref_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateFluxIliasRestObjectById(int $id, FluxIliasRestObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "flux-ilias-rest-object/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateFluxIliasRestObjectByImportId(string $import_id, FluxIliasRestObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "flux-ilias-rest-object/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateFluxIliasRestObjectByRefId(int $ref_id, FluxIliasRestObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "flux-ilias-rest-object/by-ref-id/{ref_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupById(int $id, GroupDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "group/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupByImportId(string $import_id, GroupDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "group/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupByRefId(int $ref_id, GroupDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupMemberByIdByUserId(int $id, int $user_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-id/{id}/update-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "id"      => $id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupMemberByIdByUserImportId(int $id, string $user_import_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-id/{id}/update-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "id"             => $id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupMemberByImportIdByUserId(string $import_id, int $user_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-import-id/{import_id}/update-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id,
                "user_id"   => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupMemberByImportIdByUserImportId(string $import_id, string $user_import_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-import-id/{import_id}/update-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id"      => $import_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupMemberByRefIdByUserId(int $ref_id, int $user_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}/update-member/by-id/{user_id}",
            GroupMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id"  => $ref_id,
                "user_id" => $user_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateGroupMemberByRefIdByUserImportId(int $ref_id, string $user_import_id, GroupMemberDiffDto $diff) : ?GroupMemberIdDto
    {
        return $this->request(
            "group/by-ref-id/{ref_id}/update-member/by-import-id/{user_import_id}",
            GroupMemberIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id"         => $ref_id,
                "user_import_id" => $user_import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateObjectById(int $id, ObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateObjectByImportId(string $import_id, ObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateObjectByRefId(int $ref_id, ObjectDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateObjectLearningProgressByIdByUserId(int $id, int $user_id, ObjectLearningProgress $learning_progress) : ?ObjectLearningProgressIdDto
    {
        return $this->request(
            "object/by-id/{id}/update-learning-progress/by-id/{user_id}/{learning_progress}",
            ObjectLearningProgressIdDto::class,
            DefaultMethod::PATCH,
            [
                "id"                => $id,
                "user_id"           => $user_id,
                "learning_progress" => $learning_progress
            ]
        );
    }


    public function updateObjectLearningProgressByIdByUserImportId(int $id, string $user_import_id, ObjectLearningProgress $learning_progress) : ?ObjectLearningProgressIdDto
    {
        return $this->request(
            "object/by-id/{id}/update-learning-progress/by-import-id/{user_import_id}/{learning_progress}",
            ObjectLearningProgressIdDto::class,
            DefaultMethod::PATCH,
            [
                "id"                => $id,
                "user_import_id"    => $user_import_id,
                "learning_progress" => $learning_progress
            ]
        );
    }


    public function updateObjectLearningProgressByImportIdByUserId(string $import_id, int $user_id, ObjectLearningProgress $learning_progress) : ?ObjectLearningProgressIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/update-learning-progress/by-id/{user_id}/{learning_progress}",
            ObjectLearningProgressIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id"         => $import_id,
                "user_id"           => $user_id,
                "learning_progress" => $learning_progress
            ]
        );
    }


    public function updateObjectLearningProgressByImportIdByUserImportId(string $import_id, string $user_import_id, ObjectLearningProgress $learning_progress) : ?ObjectLearningProgressIdDto
    {
        return $this->request(
            "object/by-import-id/{import_id}/update-learning-progress/by-import-id/{user_import_id}/{learning_progress}",
            ObjectLearningProgressIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id"         => $import_id,
                "user_import_id"    => $user_import_id,
                "learning_progress" => $learning_progress
            ]
        );
    }


    public function updateObjectLearningProgressByRefIdByUserId(int $ref_id, int $user_id, ObjectLearningProgress $learning_progress) : ?ObjectLearningProgressIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/update-learning-progress/by-id/{user_id}/{learning_progress}",
            ObjectLearningProgressIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id"            => $ref_id,
                "user_id"           => $user_id,
                "learning_progress" => $learning_progress
            ]
        );
    }


    public function updateObjectLearningProgressByRefIdByUserImportId(int $ref_id, string $user_import_id, ObjectLearningProgress $learning_progress) : ?ObjectLearningProgressIdDto
    {
        return $this->request(
            "object/by-ref-id/{ref_id}/update-learning-progress/by-import-id/{user_import_id}/{learning_progress}",
            ObjectLearningProgressIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id"            => $ref_id,
                "user_import_id"    => $user_import_id,
                "learning_progress" => $learning_progress
            ]
        );
    }


    public function updateOrganisationalUnitByExternalId(string $external_id, OrganisationalUnitDiffDto $diff) : ?OrganisationalUnitIdDto
    {
        return $this->request(
            "organisational-unit/by-external-id/{external_id}/update",
            OrganisationalUnitIdDto::class,
            DefaultMethod::PATCH,
            [
                "external_id" => $external_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateOrganisationalUnitById(int $id, OrganisationalUnitDiffDto $diff) : ?OrganisationalUnitIdDto
    {
        return $this->request(
            "organisational-unit/by-id/{id}/update",
            OrganisationalUnitIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateOrganisationalUnitByRefId(int $ref_id, OrganisationalUnitDiffDto $diff) : ?OrganisationalUnitIdDto
    {
        return $this->request(
            "organisational-unit/by-ref-id/{ref_id}/update",
            OrganisationalUnitIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateOrganisationalUnitPositionById(int $id, OrganisationalUnitPositionDiffDto $diff) : ?OrganisationalUnitPositionIdDto
    {
        return $this->request(
            "organisational-unit-position/by-id/{id}/update",
            OrganisationalUnitPositionIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateRoleById(int $id, RoleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "role/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateRoleByImportId(string $import_id, RoleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "role/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateScormLearningModuleById(int $id, ScormLearningModuleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/by-id/{id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateScormLearningModuleByImportId(string $import_id, ScormLearningModuleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/by-import-id/{import_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateScormLearningModuleByRefId(int $ref_id, ScormLearningModuleDiffDto $diff) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/by-ref-id/{ref_id}/update",
            ObjectIdDto::class,
            DefaultMethod::PATCH,
            [
                "ref_id" => $ref_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateUserById(int $id, UserDiffDto $diff) : ?UserIdDto
    {
        return $this->request(
            "user/by-id/{id}/update",
            UserIdDto::class,
            DefaultMethod::PATCH,
            [
                "id" => $id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function updateUserByImportId(string $import_id, UserDiffDto $diff) : ?UserIdDto
    {
        return $this->request(
            "user/by-import-id/{import_id}/update",
            UserIdDto::class,
            DefaultMethod::PATCH,
            [
                "import_id" => $import_id
            ],
            null,
            JsonBodyDto::new(
                $diff
            )
        );
    }


    public function uploadFileById(int $id, string $file, ?string $title = null, bool $replace = false) : ?ObjectIdDto
    {
        return $this->request(
            "file/by-id/{id}/upload",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "id" => $id
            ],
            null,
            FormDataBodyDto::new(
                [
                    "title"   => $title,
                    "replace" => $replace
                ],
                [
                    "file" => $file
                ]
            )
        );
    }


    public function uploadFileByImportId(string $import_id, string $file, ?string $title = null, bool $replace = false) : ?ObjectIdDto
    {
        return $this->request(
            "file/by-import-id/{import_id}/upload",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "import_id" => $import_id
            ],
            null,
            FormDataBodyDto::new(
                [
                    "title"   => $title,
                    "replace" => $replace
                ],
                [
                    "file" => $file
                ]
            )
        );
    }


    public function uploadFileByRefId(int $ref_id, string $file, ?string $title = null, bool $replace = false) : ?ObjectIdDto
    {
        return $this->request(
            "file/by-ref-id/{ref_id}/upload",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "ref_id" => $ref_id
            ],
            null,
            FormDataBodyDto::new(
                [
                    "title"   => $title,
                    "replace" => $replace
                ],
                [
                    "file" => $file
                ]
            )
        );
    }


    public function uploadScormLearningModuleById(int $id, string $file) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/by-id/{id}/upload",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "id" => $id
            ],
            null,
            FormDataBodyDto::new(
                null,
                [
                    "file" => $file
                ]
            )
        );
    }


    public function uploadScormLearningModuleByImportId(string $import_id, string $file) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/by-import-id/{import_id}/upload",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "import_id" => $import_id
            ],
            null,
            FormDataBodyDto::new(
                null,
                [
                    "file" => $file
                ]
            )
        );
    }


    public function uploadScormLearningModuleByRefId(int $ref_id, string $file) : ?ObjectIdDto
    {
        return $this->request(
            "scorm-learning-module/by-ref-id/{ref_id}/upload",
            ObjectIdDto::class,
            DefaultMethod::PUT,
            [
                "ref_id" => $ref_id
            ],
            null,
            FormDataBodyDto::new(
                null,
                [
                    "file" => $file
                ]
            )
        );
    }


    private function getRestApi() : RestApi
    {
        return RestApi::new();
    }


    private function request(
        string $route,
        ?string $response_dto_class = null,
        ?Method $method = null,
        ?array $route_params = null,
        ?array $query_params = null,
        ?BodyDto $body = null
    ) : mixed {
        $headers = [
            DefaultHeaderKey::ACCEPT->value        => DefaultBodyType::JSON->value,
            DefaultHeaderKey::AUTHORIZATION->value => DefaultAuthorizationSchema::BASIC->value . ParseHttpAuthorization_::SPLIT_SCHEMA_PARAMETERS
                . base64_encode($this->ilias_rest_api_client_config->client . "/"
                    . $this->ilias_rest_api_client_config->user . ParseHttpBasicAuthorization_::SPLIT_USER_PASSWORD . $this->ilias_rest_api_client_config->password)
        ];

        $method ??= DefaultMethod::GET;
        if ($this->ilias_rest_api_client_config->nginx_server && ($method === DefaultMethod::DELETE || $method === DefaultMethod::PATCH || $method === DefaultMethod::PUT)) {
            $headers[DefaultHeaderKey::X_HTTP_METHOD_OVERRIDE->value] = $method->value;
            $method = DefaultMethod::POST;
        }

        $response = $this->getRestApi()->makeRequest(
            ClientRequestDto::new(
                rtrim($this->ilias_rest_api_client_config->url, "/") . "/flux-ilias-rest-api/" . trim($route, "/"),
                $method,
                $query_params,
                null,
                $headers,
                $body,
                $route_params,
                null,
                true,
                false,
                false,
                $this->ilias_rest_api_client_config->trust_self_signed_certificate,
                true
            )
        );

        if ($response === null || ($response->status === DefaultStatus::_404 && $response->parsed_body instanceof TextBodyDto && $response->parsed_body->text !== "Route not found")) {
            return null;
        }

        if ($response->status !== DefaultStatus::_200 || ($response->status === DefaultStatus::_200 && $response->parsed_body instanceof HtmlBodyDto && $response->parsed_body->html === "Client does not exist.")) {
            throw new Exception("Response status " . $response->status->value . ": " . $response->raw_body);
        }

        $response_body = $response->parsed_body;

        if ($response_dto_class !== null && $response_body !== null) {
            if (!($response_body instanceof JsonBodyDto)) {
                throw new Exception("Unsupported response");
            }

            $response_body = $response_body->data;
            if ($response_body === null) {
                return null;
            }

            $newFromObject = [$response_dto_class, "newFromObject"];
            if (is_array($response_body)) {
                $response_body = array_map($newFromObject, $response_body);
            } else {
                if (is_object($response_body)) {
                    $response_body = $newFromObject($response_body);
                } else {
                    throw new Exception("Unsupported response");
                }
            }
        } else {
            if ($response_body instanceof JsonBodyDto) {
                $response_body = $response_body->data;
            }
        }

        return $response_body;
    }
}
