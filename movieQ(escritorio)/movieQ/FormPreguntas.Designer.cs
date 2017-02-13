namespace movieQ
{
    partial class FormPreguntas
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
            this.labelTextoPregunta = new System.Windows.Forms.Label();
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.comboBox1 = new System.Windows.Forms.ComboBox();
            this.label1 = new System.Windows.Forms.Label();
            this.labelTipoPregunta2 = new System.Windows.Forms.Label();
            this.comboBox2 = new System.Windows.Forms.ComboBox();
            this.buttonAñadirPregunta = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // labelTextoPregunta
            // 
            this.labelTextoPregunta.AutoSize = true;
            this.labelTextoPregunta.Location = new System.Drawing.Point(12, 30);
            this.labelTextoPregunta.Name = "labelTextoPregunta";
            this.labelTextoPregunta.Size = new System.Drawing.Size(80, 13);
            this.labelTextoPregunta.TabIndex = 1;
            this.labelTextoPregunta.Text = "Texto Pregunta";
            // 
            // textBox1
            // 
            this.textBox1.Location = new System.Drawing.Point(15, 70);
            this.textBox1.Name = "textBox1";
            this.textBox1.Size = new System.Drawing.Size(245, 20);
            this.textBox1.TabIndex = 2;
            // 
            // comboBox1
            // 
            this.comboBox1.FormattingEnabled = true;
            this.comboBox1.Items.AddRange(new object[] {
            "Directores",
            "Actores",
            "Oscars"});
            this.comboBox1.Location = new System.Drawing.Point(15, 143);
            this.comboBox1.Name = "comboBox1";
            this.comboBox1.Size = new System.Drawing.Size(121, 21);
            this.comboBox1.TabIndex = 3;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(12, 111);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(74, 13);
            this.label1.TabIndex = 4;
            this.label1.Text = "Tipo Pregunta";
            // 
            // labelTipoPregunta2
            // 
            this.labelTipoPregunta2.AutoSize = true;
            this.labelTipoPregunta2.Location = new System.Drawing.Point(12, 186);
            this.labelTipoPregunta2.Name = "labelTipoPregunta2";
            this.labelTipoPregunta2.Size = new System.Drawing.Size(83, 13);
            this.labelTipoPregunta2.TabIndex = 5;
            this.labelTipoPregunta2.Text = "Tipo Pregunta 2";
            // 
            // comboBox2
            // 
            this.comboBox2.FormattingEnabled = true;
            this.comboBox2.Items.AddRange(new object[] {
            "Directores",
            "Actores",
            "Oscars",
            "Ninguno"});
            this.comboBox2.Location = new System.Drawing.Point(15, 217);
            this.comboBox2.Name = "comboBox2";
            this.comboBox2.Size = new System.Drawing.Size(121, 21);
            this.comboBox2.TabIndex = 6;
            // 
            // buttonAñadirPregunta
            // 
            this.buttonAñadirPregunta.Location = new System.Drawing.Point(15, 270);
            this.buttonAñadirPregunta.Name = "buttonAñadirPregunta";
            this.buttonAñadirPregunta.Size = new System.Drawing.Size(104, 23);
            this.buttonAñadirPregunta.TabIndex = 7;
            this.buttonAñadirPregunta.Text = "Añadir Pregunta";
            this.buttonAñadirPregunta.UseVisualStyleBackColor = true;
            // 
            // FormPreguntas
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(284, 320);
            this.Controls.Add(this.buttonAñadirPregunta);
            this.Controls.Add(this.comboBox2);
            this.Controls.Add(this.labelTipoPregunta2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.comboBox1);
            this.Controls.Add(this.textBox1);
            this.Controls.Add(this.labelTextoPregunta);
            this.Name = "FormPreguntas";
            this.Text = "FormPreguntas";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label labelTextoPregunta;
        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.ComboBox comboBox1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label labelTipoPregunta2;
        private System.Windows.Forms.ComboBox comboBox2;
        private System.Windows.Forms.Button buttonAñadirPregunta;
    }
}