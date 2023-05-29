<?php
// encerar sessão
session_start();
// destruir sessão
session_destroy();
// redirecionar para a página de login
header("Location: ../");