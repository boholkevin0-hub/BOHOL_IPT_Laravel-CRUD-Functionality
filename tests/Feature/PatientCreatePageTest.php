<?php

namespace Tests\Feature;

use Tests\TestCase;

class PatientCreatePageTest extends TestCase
{
    public function test_patient_create_page_loads()
    {
        $response = $this->get('/patients/create');

        $response->assertOk();
        $response->assertSee('Create Patient');
    }
}
