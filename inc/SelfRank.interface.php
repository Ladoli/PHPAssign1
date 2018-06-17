<?php

//I'm not sure what this is for, I'm guessing this is for "priority" in search results?

//Matches ranking uses this priority
// i. Email
// ii. Phone Number
// iii. First Name
// iv. Last Name
// v. Job Title
// vi. Department

interface ISelfRank {

    public function selfRank($term);

}

?>
