<?php

namespace App\Services;

use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;

class FirebaseService
{
    protected $firestore;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(config('firebase.credentials'));
        $this->firestore = $factory->createFirestore()->database();
    }

    public function firestore()
    {
        return $this->firestore;
    }
}
