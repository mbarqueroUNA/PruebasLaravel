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
            mail to: 'DESTINO@gmail.com',
                subject: "✅ CI PASÓ - ${env.JOB_NAME}",
                body: "Las pruebas pasaron correctamente."
        }
        failure {
            mail to: 'DESTINO@gmail.com',
                subject: "❌ CI FALLÓ - ${env.JOB_NAME}",
                body: "Las pruebas fallaron."
        }
    }

}