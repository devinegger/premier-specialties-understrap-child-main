<?php

/**
 * Template Part for displaying ACF Team Members
 * 
 * Displays a 3 column row with the Team Members custom post type data displayed in cards using the Title as 
 * the name of the person, and then custom fields for Headshot, Job Title, and Job Description
 * 
 * This template file also creates a modal with a carousel for each Team Member CPT as well.
 * 
 */

$team_cards = get_sub_field('team_cards'); // array of Team Members CPTs
$num_team_members = count($team_cards); 
?>

<div class="container px-3 py-2">
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">

<?php
foreach($team_cards as $team_card) : 

    $team_member = $team_card['team_member']; // this is the Team Member CPT
    $name = $team_member->post_title;
    $headshot_URL = wp_get_attachment_url( get_post_meta( $team_member->ID, 'headshot', TRUE ) );
    $job_title = get_post_meta($team_member->ID, 'job_title', TRUE);
    $job_description = get_post_meta( $team_member->ID, 'job_description', TRUE );
    $job_description = substr($job_description,0,200);
?>
        <div class="col">
            <div class="card text-center team-member border-0">
                <img src="<?= $headshot_URL ?>" class="card-img-top headshot m-auto pt-2" alt="..." />
                <div class="card-body p-2">
                    <h3 class="card-title mb-1 fw-bold fs-5"><?= $name ?></h3>
                    <h4 class="card-subtitle mb-2 fw-light fs-6"><?= $job_title ?></h4>
                    <p class="card-text text-gray text-start lh-2 fs-6"><?= $job_description ?>
                        <span class="more-link">
                            <!--  ~~ ** ~~  I need to find a way to make this link open the Modal AND slide to the correct slide > use JS ~~ ** ~~ -->  
                            <a href="#" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#teamModal" data-bs-slide-to="<?=  $count ?>"> > More</a>
                        </span>
                    </p>
                </div>
            </div>
        </div> 
<?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php  for($i=0; $i<$num_team_members; $i++ ) : ?>
                            <button type="button" data-bs-target="#teamCarouselIndicators" data-bs-slide-to="<?= $i ?>" class="active" aria-current="true" aria-label="Slide <?= $i ?>"></button>
                        <?php  endfor; ?>
                    </div>
                    <div class="carousel-inner">

<?php
$count=0;
foreach($team_cards as $team_card) : 

    $team_member = $team_card['team_member']; // this is the Team Member CPT
    $name = $team_member->post_title;
    $headshot_URL = wp_get_attachment_url( get_post_meta( $team_member->ID, 'headshot', TRUE ) );
    $job_title = get_post_meta($team_member->ID, 'job_title', TRUE);
    $job_description = get_post_meta( $team_member->ID, 'job_description', TRUE );
    $count===0 ? $class="active" : $class="" ;
?>

                        <div class="carousel-item <?= $class ?>">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?= $headshot_URL ?>" alt="">
                                        <h3 class="mb-0 mt-1 fw-bold fs-5"><?= $name ?></h3>
                                        <h4 class="mb-2 fw-light fs-6"><?= $job_title ?></h4>
                                    </div>
                                    <div class="col-md-9"><?= $job_description ?></div>
                                </div>
                            </div>
                        </div>

<?php $count++; ?>
<?php endforeach; ?>
                        
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->