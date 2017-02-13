namespace movieQ
{
    partial class FormOpciones
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormOpciones));
            this.buttonEstadisticas = new System.Windows.Forms.Button();
            this.buttonGestionPreguntas = new System.Windows.Forms.Button();
            this.buttonGestionUsuarios = new System.Windows.Forms.Button();
            this.toolStrip1 = new System.Windows.Forms.ToolStrip();
            this.toolStripLabelBienvenido = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonCerrarSesion = new System.Windows.Forms.ToolStripButton();
            this.toolStrip1.SuspendLayout();
            this.SuspendLayout();
            // 
            // buttonEstadisticas
            // 
            this.buttonEstadisticas.Location = new System.Drawing.Point(27, 170);
            this.buttonEstadisticas.Name = "buttonEstadisticas";
            this.buttonEstadisticas.Size = new System.Drawing.Size(127, 23);
            this.buttonEstadisticas.TabIndex = 5;
            this.buttonEstadisticas.Text = "Estadísticas";
            this.buttonEstadisticas.UseVisualStyleBackColor = true;
            // 
            // buttonGestionPreguntas
            // 
            this.buttonGestionPreguntas.Location = new System.Drawing.Point(27, 123);
            this.buttonGestionPreguntas.Name = "buttonGestionPreguntas";
            this.buttonGestionPreguntas.Size = new System.Drawing.Size(127, 23);
            this.buttonGestionPreguntas.TabIndex = 4;
            this.buttonGestionPreguntas.Text = "Gestionar Preguntas";
            this.buttonGestionPreguntas.UseVisualStyleBackColor = true;
            this.buttonGestionPreguntas.Click += new System.EventHandler(this.buttonGestionPreguntas_Click);
            // 
            // buttonGestionUsuarios
            // 
            this.buttonGestionUsuarios.Location = new System.Drawing.Point(27, 77);
            this.buttonGestionUsuarios.Name = "buttonGestionUsuarios";
            this.buttonGestionUsuarios.Size = new System.Drawing.Size(127, 23);
            this.buttonGestionUsuarios.TabIndex = 3;
            this.buttonGestionUsuarios.Text = "Gestionar Usuarios";
            this.buttonGestionUsuarios.UseVisualStyleBackColor = true;
            this.buttonGestionUsuarios.Click += new System.EventHandler(this.buttonGestionUsuarios_Click);
            // 
            // toolStrip1
            // 
            this.toolStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripLabelBienvenido,
            this.toolStripButtonCerrarSesion});
            this.toolStrip1.Location = new System.Drawing.Point(0, 0);
            this.toolStrip1.Name = "toolStrip1";
            this.toolStrip1.Size = new System.Drawing.Size(284, 25);
            this.toolStrip1.TabIndex = 8;
            this.toolStrip1.Text = "toolStrip1";
            // 
            // toolStripLabelBienvenido
            // 
            this.toolStripLabelBienvenido.Name = "toolStripLabelBienvenido";
            this.toolStripLabelBienvenido.Size = new System.Drawing.Size(0, 22);
            // 
            // toolStripButtonCerrarSesion
            // 
            this.toolStripButtonCerrarSesion.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.toolStripButtonCerrarSesion.Image = ((System.Drawing.Image)(resources.GetObject("toolStripButtonCerrarSesion.Image")));
            this.toolStripButtonCerrarSesion.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.toolStripButtonCerrarSesion.Name = "toolStripButtonCerrarSesion";
            this.toolStripButtonCerrarSesion.Size = new System.Drawing.Size(23, 22);
            this.toolStripButtonCerrarSesion.Text = "Cerrar Sesión";
            this.toolStripButtonCerrarSesion.Click += new System.EventHandler(this.toolStripButtonCerrarSesion_Click);
            // 
            // FormOpciones
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(284, 261);
            this.Controls.Add(this.toolStrip1);
            this.Controls.Add(this.buttonEstadisticas);
            this.Controls.Add(this.buttonGestionPreguntas);
            this.Controls.Add(this.buttonGestionUsuarios);
            this.Name = "FormOpciones";
            this.Text = "FormOpciones";
            this.Load += new System.EventHandler(this.FormOpciones_Load);
            this.toolStrip1.ResumeLayout(false);
            this.toolStrip1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button buttonEstadisticas;
        private System.Windows.Forms.Button buttonGestionPreguntas;
        private System.Windows.Forms.Button buttonGestionUsuarios;
        private System.Windows.Forms.ToolStrip toolStrip1;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBienvenido;
        private System.Windows.Forms.ToolStripButton toolStripButtonCerrarSesion;
    }
}