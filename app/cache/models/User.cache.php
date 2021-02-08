<?php
return array("#tableName"=>"user","#primaryKeys"=>["id"=>"id"],"#manyToOne"=>["organization"],"#fieldNames"=>["id"=>"id","firstname"=>"firstname","lastname"=>"lastname","email"=>"email","password"=>"password","suspended"=>"suspended","organization"=>"idOrganization","groupes"=>"groupes"],"#memberNames"=>["id"=>"id","firstname"=>"firstname","lastname"=>"lastname","email"=>"email","password"=>"password","suspended"=>"suspended","idOrganization"=>"organization","groupes"=>"groupes"],"#fieldTypes"=>["id"=>"mixed","firstname"=>"mixed","lastname"=>"mixed","email"=>"mixed","password"=>"mixed","suspended"=>"mixed","organization"=>"","groupes"=>"mixed"],"#nullable"=>[],"#notSerializable"=>["organization","groupes"],"#transformers"=>["toView"=>["password"=>"Ubiquity\\contents\\transformation\\transformers\\Password"]],"#accessors"=>["id"=>"setId","firstname"=>"setFirstname","lastname"=>"setLastname","email"=>"setEmail","password"=>"setPassword","suspended"=>"setSuspended","idOrganization"=>"setOrganization","groupes"=>"setGroupes"],"#manyToMany"=>["groupes"=>["targetEntity"=>"models\\Groupe","inversedBy"=>"users"]],"#joinTable"=>["groupes"=>["name"=>"groupeusers"]],"#joinColumn"=>["organization"=>["className"=>"models\\Organization","name"=>"idOrganization"]],"#invertedJoinColumn"=>["idOrganization"=>["member"=>"organization","className"=>"models\\Organization"]]);
