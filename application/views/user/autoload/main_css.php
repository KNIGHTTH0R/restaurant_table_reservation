    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/responsive.dataTables.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/sweetalert2.css')?>">
    <style>
        .wrapper {
            display: flex;
            flex-direction: row;
        }

        @media (min-width:320px)
        {
            .sidebar {
                width: 40vw;
            }
            .content {
                width: 100vw;
            }
        }
        @media (min-width:480px)
        {
            .sidebar {
                width: 40vw;
            }
            .content {
                width: 100vw;
            }
        }
        @media (min-width:720px)
        {
            .sidebar {
                width: 30vw;
            }
            content {
                width: 70vw;
            }
        }
        @media (min-width:1024px)
        {
            .sidebar {
                width: 20vw;
            }
            .content {
                width: 80vw;
            }
        }

        .svg-embed {
            width: 1em;
            height: 1em;
            font-size: 20px;
        }
        .svg-embed:hover {
            cursor: pointer;
        }
    </style>