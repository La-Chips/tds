<?php
return array("#tableName"=>"settings","#primaryKeys"=>["id"=>"id"],"#manyToOne"=>[],"#fieldNames"=>["id"=>"id","name"=>"name","organizationsettingss"=>"organizationsettingss"],"#memberNames"=>["id"=>"id","name"=>"name","organizationsettingss"=>"organizationsettingss"],"#fieldTypes"=>["id"=>"mixed","name"=>"mixed","organizationsettingss"=>"mixed"],"#nullable"=>[],"#notSerializable"=>["organizationsettingss"],"#transformers"=>[],"#accessors"=>["id"=>"setId","name"=>"setName","organizationsettingss"=>"setOrganizationsettingss"],"#oneToMany"=>["organizationsettingss"=>["mappedBy"=>"settings","className"=>"models\\Organizationsettings"]]);
