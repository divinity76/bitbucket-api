<?php

namespace Bitbucket\Tests\API\Repositories;

use Bitbucket\Tests\API as Tests;

class BranchRestrictionsTest extends Tests\TestCase
{
    public function testGetAllRestrictions()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions';
        $expectedResult = $this->fakeResponse(array('dummy'));

        $client = $this->getHttpClientMock();
        $client->expects($this->any())
            ->method('get')
            ->with($endpoint)
            ->willReturn($expectedResult);

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restrictions */
        $restrictions   = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);
        $actual         = $restrictions->all('gentle', 'eof', array('dummy'));

        $this->assertEquals($expectedResult, $actual);
    }

    public function testAddRestrictionType()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions';
        $params         = array(
            'kind' => 'testpermission'
        );

        $client = $this->getHttpClientMock();
        $client->expects($this->once())
            ->method('post')
            ->with($endpoint, json_encode($params));

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restrictions */
        $restrictions   = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);
        $restrictions->addAllowedRestrictionType(array('testpermission'));

        $restrictions->create('gentle', 'eof', $params);
    }

    public function testCreateRestrictionFromArray()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions';
        $params         = array(
            'kind' => 'push'
        );

        $client = $this->getHttpClientMock();
        $client->expects($this->once())
            ->method('post')
            ->with($endpoint, json_encode($params));

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restrictions */
        $restrictions   = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);

        $restrictions->create('gentle', 'eof', $params);
    }

    public function testCreateRestrictionFromJSON()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions';
        $params         = json_encode(array(
            'kind' => 'push'
        ));

        $client = $this->getHttpClientMock();
        $client->expects($this->once())
            ->method('post')
            ->with($endpoint, $params);

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restrictions */
        $restrictions   = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);

        $restrictions->create('gentle', 'eof', $params);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider restrictionsInvalidParamsProvider
     */
    public function testCreateRestrictionWithInvalidParams($params)
    {
        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restrictions */
        $restrictions   = $this->getApiMock('Bitbucket\API\Repositories\BranchRestrictions');

        $restrictions->create('gentle', 'eof', $params);
    }

    public function restrictionsInvalidParamsProvider()
    {
        return [
            [''],
            [3],
            ["{ 'foo': 'bar' }"]
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateRestrictionFromArrayShouldFailWithInvalidRestrictionKind()
    {
        $params         = array(
            'kind' => 'invalid'
        );

        $restrictions   = new \Bitbucket\API\Repositories\BranchRestrictions;

        $restrictions->create('gentle', 'eof', $params);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateRestrictionFromJSONShouldFailWithInvalidRestrictionKind()
    {
        $params         = json_encode(array(
            'kind' => 'invalid'
        ));

        $restrictions   = new \Bitbucket\API\Repositories\BranchRestrictions;

        $restrictions->create('gentle', 'eof', $params);
    }

    public function testGetSpecificRestriction()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions/1';
        $expectedResult = $this->fakeResponse(array('dummy'));

        $client = $this->getHttpClientMock();
        $client->expects($this->once())
            ->method('get')
            ->with($endpoint)
            ->willReturn($expectedResult);

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restriction */
        $restriction    = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);
        $actual         = $restriction->get('gentle', 'eof', 1);

        $this->assertEquals($expectedResult, $actual);
    }

    public function testUpdateRestrictionFromArray()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions/1';
        $params         = array(
            'users' => array(
                array('username' => 'vimishor'),
                array('username' => 'gtl_test1')
            )
        );

        $client = $this->getHttpClientMock();
        $client->expects($this->once())
            ->method('put')
            ->with($endpoint, json_encode($params));

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restriction */
        $restriction = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);

        $restriction->update('gentle', 'eof', 1, $params);
    }

    public function testUpdateRestrictionFromJSON()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions/1';
        $params         = json_encode(array(
            'dummy' => array(
                array('username' => 'vimishor'),
                array('username' => 'gtl_test1')
            )
        ));

        $client = $this->getHttpClientMock();
        $client->expects($this->once())
            ->method('put')
            ->with($endpoint, $params);

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restriction */
        $restriction = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);

        $restriction->update('gentle', 'eof', 1, $params);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider restrictionsInvalidParamsProvider
     */
    public function testUpdateRestrictionWithInvalidParams($params)
    {
        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restrictions */
        $restrictions   = $this->getApiMock('Bitbucket\API\Repositories\BranchRestrictions');

        $restrictions->update('gentle', 'eof', 1, $params);
        $restrictions->update('gentle', 'eof', 1, $params);
        $restrictions->update('gentle', 'eof', 1, $params);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateRestrictionShouldFailIfKindIsSpecified()
    {
        $params         = array(
                'kind' => 'invalid'
            );

        $restrictions   = new \Bitbucket\API\Repositories\BranchRestrictions;

        $restrictions->update('gentle', 'eof', 1, $params);
    }

    public function testDeleteRestriction()
    {
        $endpoint       = '/repositories/gentle/eof/branch-restrictions/1';

        $client = $this->getHttpClientMock();
        $client->expects($this->once())
            ->method('delete')
            ->with($endpoint);

        /** @var \Bitbucket\API\Repositories\BranchRestrictions $restriction */
        $restriction = $this->getClassMock('Bitbucket\API\Repositories\BranchRestrictions', $client);

        $restriction->delete('gentle', 'eof', 1);
    }
}
