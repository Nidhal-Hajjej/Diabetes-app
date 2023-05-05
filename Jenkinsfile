pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo "hello word"
            }
        }

        // stage('Run Tests') {
        //     steps {
        //         sh 'php artisan test'
        //     }
            
        //     post {
        //         failure {
        //             echo 'Tests failed, switching to fallback database'
                    
        //             sh '''
        //                 php artisan config:cache
        //                 php artisan config:clear
        //                 php artisan migrate:refresh --seed --database=fallback
        //                 php artisan config:cache
        //             '''
        //         }
        //     }
        // }
        
    }
}