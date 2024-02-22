<?php

define('UTILS_DIR', __DIR__ . '/utils/');
define('CLASSES_DIR', __DIR__ . '/classes/');
define('ENUMS_DIR', __DIR__ . '/enums/');
define('TODO_LIST_DIR', __DIR__ . '/todolist/');

const COMMANDS = "List of commands: 
 - files (get names of the created files); 
 - read <string fileName> (to view tasks);
 - record <string fileName> '<string text>' <int priority> (to record task);
 - done <string fileName> <int id> (to mark task completed);
 - remove <string fileName> <int id> (to remove task);
 - exit (to exit the program);
 - help (to view commands).";
