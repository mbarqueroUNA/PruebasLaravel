pipeline {
    agent any

    stages {

        stage('Preparar entorno Laravel') {
            steps {
                bat 'copy .env.example .env'
                bat 'php artisan key:generate'
            }
        }

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