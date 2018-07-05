<?php
Register::Route('/', 'Index@IndexController');
Register::Route('/to-do', 'Index@TodoController');

Register::Route('/api/to-do', 'Api@TodoController');
Register::Route('/api/to-do/{id}', 'Api@TodoController');
