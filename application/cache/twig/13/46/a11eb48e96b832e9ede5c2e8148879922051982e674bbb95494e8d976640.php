<?php

/* default/admin_materi/detail.html */
class __TwigTemplate_1346a11eb48e96b832e9ede5c2e8148879922051982e674bbb95494e8d976640 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"bs-callout bs-callout-info\">
    <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">
        ";
        // line 3
        echo anchor(("admin/materi/add/tertulis/" . (isset($context["ref_param"]) ? $context["ref_param"] : null)), "Tambah Materi Tertulis", array("class" => "btn btn-primary"));
        echo "
        ";
        // line 4
        echo anchor(("admin/materi/add/file/" . (isset($context["ref_param"]) ? $context["ref_param"] : null)), "Tambah Materi File", array("class" => "btn btn-primary"));
        echo "
    </div>
    <b>Matapelajaran :</b> ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo " <b>Kelas : </b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo "
</div>

<br>

<table class=\"table table-striped\">
    <thead>
        <tr>
            <th width=\"7%\">No</th>
            <th>Judul</th>
            <th width=\"15%\">Type</th>
            <th width=\"10%\">View</th>
            <th width=\"15%\"></th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materis"]) ? $context["materis"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["m"]) {
            // line 23
            echo "        ";
            if ((!(null === $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pengajar_id")))) {
                // line 24
                echo "            ";
                $context["p"] = get_row_data("pengajar_model", "retrieve", array(0 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pengajar_id")));
                // line 25
                echo "            ";
                $context["link"] = ((("admin/pengajar/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"));
                // line 26
                echo "        ";
            } elseif ((!(null === $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "siswa_id")))) {
                // line 27
                echo "            ";
                $context["p"] = get_row_data("siswa_model", "retrieve", array(0 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "siswa_id")));
                // line 28
                echo "            ";
                $context["link"] = ((("admin/siswa/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"));
                // line 29
                echo "        ";
            }
            // line 30
            echo "        <tr>
            <td>";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
            <td>
                ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
            echo "
                <br><small><b>Pembuat : </b> ";
            // line 34
            echo anchor((isset($context["link"]) ? $context["link"] : null), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "nama"));
            echo ", ";
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_posting")), "html", null, true);
            echo "</small>
            </td>
            <td>
                ";
            // line 37
            echo (((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) ? ("<span class=\"label label-info\">File</span>") : ("<span class=\"label label-success\">Tertulis</span>"));
            echo "
            </td>
            <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "views"), "html", null, true);
            echo "</td>
            <td>
                <div class=\"btn-group\">
                    ";
            // line 42
            if ((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) {
                // line 43
                echo "                        ";
                $context["url_type"] = "file";
                // line 44
                echo "                        ";
                echo anchor(((((("admin/materi/info/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-small"));
                echo "
                    ";
            } else {
                // line 46
                echo "                        ";
                $context["url_type"] = "tertulis";
                // line 47
                echo "                        ";
                echo anchor(((((("admin/materi/info/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-small"));
                echo "
                    ";
            }
            // line 49
            echo "                    ";
            echo anchor(((((("admin/materi/edit/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-small"));
            echo "
                    ";
            // line 50
            echo anchor(((("admin/materi/delete/" . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-trash\"></i> Hapus", array("class" => "btn btn-small", "onclick" => "return confirm('Anda yakin ingin menghapus?')"));
            echo "
                </div>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "    </tbody>
</table>
<br>
";
        // line 58
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_materi/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 58,  145 => 55,  134 => 50,  129 => 49,  123 => 47,  120 => 46,  114 => 44,  111 => 43,  109 => 42,  103 => 39,  98 => 37,  90 => 34,  86 => 33,  81 => 31,  78 => 30,  75 => 29,  72 => 28,  69 => 27,  66 => 26,  63 => 25,  60 => 24,  57 => 23,  53 => 22,  32 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }
}