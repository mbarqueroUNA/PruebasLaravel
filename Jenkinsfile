pipeline {
    agent any

    stages {

        stage('Instalar dependencias') {
            steps {
                bat 'composer install --no-interaction'
            }
        }

        stage('Ejecutar pruebas') {
            steps {
                bat 'php artisan test'
            }
        }
    }

    post {
        success {
            echo '✅ Pruebas pasaron: se autoriza despliegue'
        }

        failure {
            echo '❌ Pruebas fallaron: NO se despliega'
        }
    }
}