<?php
//     namespace Drupal\resume\Controller;
//     use Drupal\Core\Controller\ControllerBase;

//     class ResumeController extends ControllerBase{
//         public function createResume(){
//             $form = \Drupal::formBuilder()->getForm('\Drupal\resume\Form\ResumeForm');
//             $renderForm = \Drupal::service('renderer')->render($form);
//             return['#type'=>'markup',
//                 '#markup'=>$renderForm,
//                 '#title'=>'Resume Form'

//         ];
//     }
// }
    namespace Drupal\resume\Controller;
    use Drupal\Core\Controller\ControllerBase;
    use Drupal\node\Entity\Node;

    class ResumeController extends ControllerBase{
        public function createResume($nid){
          $transNode = Node::load($nid);
          // $output = '<div class = "seller-details"><h6></h6>';
          // $output.= '<p><b>Resume Builder : </b><span>' .$transNode->get('title')->value. '</span></p>';
          // $output.= '<p><b>Candidate Gender : </b><span>' .$transNode->get('field_gender')->value. '</span></p>';
          // $output.= '<p><b>Candidate Full Name : </b><span>' .$transNode->get('field_full_name')->value. '</span></p>';
          // $output.= '<p><b>Candidate Email Id : </b><span>'.$transNode->get('field_email_id')->value. '</span></p>';
          // $output.= '<p><b>Candidate Contact No : </b><span>' .$transNode->get('field_contact_number')->value. '</span></p>';
          // $output.= '<p><b>Candidate DOB : </b><span>' .$transNode->get('field_dob')->value. '</span></p>';
          // $output.= '<p><b>Candidate Address : </b><span>' .$transNode->get('field_address')->value. '</span></p>';
          // $output.= '<p><b>Candidate Objective : </b><span>'.$transNode->get('field_objective')->value. '</span></p>';
          // $output.= '<p><b>Candidate SSC : </b><span>'.$transNode->get('field_ssc')->value. '</span></p>';
          // $output.= '<p><b>Candidate HSC/Diploma : </b><span>'.$transNode->get('field_hsc_diploma')->value. '</span></p>';
          // $output.= '<p><b>Candidate Higher Qualification : </b><span>'.$transNode->get('field_higher_qualification')->value. '</span></p>';
          // $output.= '<p><b>Candidate Project : </b><span>' .$transNode->get('field_projects')->value. '</span></p>';
          // $output.= '<p><b> Candidate Skill : </b><span>' .$transNode->get('field_skills')->value. '</span></p>';
          // $output.= '<p><b> Candidate Intrest : </b><span>' .$transNode->get('field_interest')->value. '</span></p>';

          // $output.= '</div>';

//             return [
//               '#type' => 'markup',
//               '#markup' => $output,
//             ];

//     }
// }
            $resume_data = array(
              '#theme' => 'resumearray',
              '#xyz'=> $transNode,
            );
            return $resume_data;

            }
            }